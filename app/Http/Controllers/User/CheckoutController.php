<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests\User\FormCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Order;
use App\Model\OrderDetail;
use Carbon\Carbon;
use App\ShoppingCart;
use Session;
use Mail;
class CheckoutController extends Controller
{
    // View shopping-cart
    public function index()
    {
        return view('user.dathang.shoppingcart');
    }

    // Update qty sản phẩm ở shopping-cart
    public function update(Request $request)
    {
        if($request->ajax())
        {
            if(Session::has('cart'))
            {
                if($request->qty!=0)
                {

                    $updateCart = new ShoppingCart(Session('cart'));
                    $updateCart->updateCart($request->rowId,$request->qty);
                    Session(['cart'=>$updateCart]);
                    return view('user.dathang.template.table-cart');
                }
                else
                {
                    $deleteCart = new ShoppingCart(Session('cart'));
                    $deleteCart->deleteCart($request->rowId);
                    Session(['cart'=>$deleteCart]);
                    return view('user.dathang.template.table-cart');
                }
            }
        }
    }

    // Xóa 1 sản phẩm ở shopping-cart
    public function delete(Request $request)
    {
        if($request->ajax())
        {
            if(Session::has('cart'))
            {
                $deleteCart = new ShoppingCart(Session('cart'));
                $deleteCart->deleteCart($request->rowId);
                Session(['cart'=>$deleteCart]);
            }
            return view('user.dathang.template.table-cart');
        }
    }

    // View checkout
    public function viewCheckout(Request $request)
    {
        if($request->vnp_ResponseCode=='00')
        {
            $transaction_id = $request->vnp_TxnRef;
            $order = Order::find($transaction_id);
            if($order->update(['status'=>1])){
                return view('user.dathang.template.success_checkout');
            }
        }
        else{
            if(Auth::check())
            {
                $user = User::find(Auth::User()->id);
                return view('user.dathang.checkout',compact('user'));
            }
            return view('user.dathang.checkout');
        }
    }

    // Xử lí checkout
    public function createCheckout(Request $request)
    {
        $array = null;
        if(Auth::check())
        {
            if(empty(Auth::User()->address))
            {
                return redirect('account/address');
            }
            else
            {
                $array = Order::create([
                    'customer_id'=>Auth::User()->id,
                    'payment'=>$request->payment,
                    'note'=>$request->notes,
                    'status'=>0,
                    'phone'=>Auth::User()->phone,
                    'address'=> Auth::User()->address,
                    'name'=>Auth::User()->name,
                    'email'=>Auth::User()->email,
                ]);
                $order = Order::find($array->id);
            }
        }
        else
        {
            $this->validate($request,
                [
                    'name'=>'required|regex:[^[a-zA-Z]]',
                    'email'=>'required|email',
                    'address'=>'required|regex:[^[a-zA-Z0-9]]',
                    'phone'=>'required|numeric|regex:/(0)[0-9]{9}/'
                ],

                [
                    'name.required'=>'Vui lòng nhập tên đầy đủ',
                    'name.regex'=>'Họ tên không được có kí tự đặc biệt',
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Không đúng định dạng email',
                    'phone.required'=>'Vui lòng nhập số điện thoại',
                    'phone.regex'=>'Mobile phải bắt đầu bằng số 0 và mobile có có 10 số',
                    'phone.numeric'=>'Mobile phải là số',
                    'address.required'=>'Vui lòng nhập địa chỉ',
                    'address.regex'=>'Địa chỉ không được có kí tự đặc biệt'
                ]
            );
            $data = array('email'=>$request->email,'cart'=>Session('cart')->products,'date'=>Carbon::now('Asia/Ho_Chi_Minh'),'total'=>Session('cart')->totalPrice);
            Mail::send('user.dathang.template.mail_purchase',$data,
                function($messenger) use ($data){
                    $messenger->to($data["email"],'Hệ thống')->subject('[Alley Baker] Đơn hàng của bạn?');
            });
            $array = Order::create([
                'customer_id'=>null,
                'payment'=>$request->payment,
                'note'=>$request->notes,
                'status'=>0,
                'phone'=>$request->phone,
                'address'=> $request->address,
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            $order = Order::find($array->id);
        }
        if(Session::has('cart'))
        {
            foreach (Session::get('cart')->products as $key => $cart) {
                $order->OrderDetails()->create([
                    'product_id'=>$key,
                    'qty'=>$cart['qty'],
                    'product_price'=>empty($cart['promotion_price'])? $cart['unit_price'] : $cart['promotion_price']
                ]);
            }
        }
        $request->session()->forget('cart');
        if(!empty($request->order_desc)){
            session(['cost_id' => $request->id]);
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "LFKGQ0FH"; //Mã website tại VNPAY 
            $vnp_HashSecret = "IPCQSWSJZHHOWPDWPODJDLZTAHCAIOZL"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://suoitien2.000webhostapp.com/checkout";
            $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $request->order_desc."0123456789";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $request->amount * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();
    
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
               // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            return redirect($vnp_Url);
        }
        return view('user.dathang.template.success_checkout');
    }
}