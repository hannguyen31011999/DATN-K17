<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests\User\FormCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Order;
use App\Model\Product;
use App\Model\OrderDetail;
use App\Model\Member;
use App\Model\Province;
use App\Model\District;
use App\Model\Village;
use Carbon\Carbon;
use App\ShoppingCart;
use Session;
use Mail;
class CheckoutController extends Controller
{
    // View shopping-cart
    public function index(Request $request)
    {
        $request->session()->put('urlAction',$request->url());
        if(Auth::check())
        {
            $discount = Member::where('user_id',Auth::User()->id)->pluck('point');
            return view('user.dathang.shoppingcart',compact('discount'));
        }
        return view('user.dathang.shoppingcart');
    }

    // Update qty sản phẩm ở shopping-cart
    public function update(Request $request)
    {
        if($request->ajax())
        {
            if(Session::has('cart'))
            {
                if($request->qty>0)
                {
                    $updateCart = new ShoppingCart(Session('cart'));
                    $product = Product::find((int)$request->rowId);
                    if($product->qty>$request->qty)
                    {
                        $updateCart->updateCart($request->rowId,$request->qty);
                        Session(['cart'=>$updateCart]);
                        return view('user.dathang.template.table-cart');
                    }
                    else
                    {
                        return "fail";
                    }
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
        $provence = Province::all();
        if(isset($request->vnp_ResponseCode))
        {
            if($request->vnp_ResponseCode=='00')
            {
                $transaction_id = $request->vnp_TxnRef;
                $order = Order::find($transaction_id);
                if($order->update(['status'=>1])){
                    $request->session()->forget('transaction_id');
                    $request->session()->forget('cart');
                    return view('user.dathang.template.success_checkout',compact('provence'));
                }
            }
            else
            {
                $request->session()->put('transaction_id',$request->vnp_TxnRef);
                $error_bank = "Thanh toán trực tuyến thất bại";
                if(Auth::check())
                {
                    $user = User::find(Auth::User()->id);
                    return view('user.dathang.checkout',compact('user','error_bank'));
                }
                return view('user.dathang.checkout',compact('error_bank','provence'));
            }
        }
        else{
            $request->session()->put('urlAction',$request->url());
            if(Auth::check())
            {
                $discount = Member::where('user_id',Auth::User()->id)->pluck('point');
                $user = User::find(Auth::User()->id);
                return view('user.dathang.checkout',compact('user','discount'));
            }
            return view('user.dathang.checkout',compact('provence'));
        }
    }

    // Xử lí checkout
    public function createCheckout(Request $request)
    {
        $array = null;
        $order = null;
        $point = 0;
        if(isset($request->vnp_TxnRef)||Session::has('transaction_id'))
        {
            $id = !empty($request->vnp_TxnRef) ? $request->vnp_TxnRef : Session('transaction_id');
            $order = Order::find($id);
            $order->update(['note'=>$request->notes]);
        }
        else
        {
            if(Auth::check())
            {
                $point = User::find(Auth::User()->id)->Members()->get()->pluck('point')[0];
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
                        'name'=>'required|regex:[^[a-zA-Z]]|max:124',
                        'email'=>'required|email|max:124',
                        'address'=>'required|regex:[^[a-zA-Z0-9]]|max:124',
                        'province'=>'numeric',
                        'district'=>'numeric',
                        'village'=>'numeric',
                        'phone'=>'required|numeric|regex:/(0)[0-9]{9}/'
                    ],
    
                    [
                        'name.required'=>'Vui lòng nhập tên đầy đủ',
                        'name.regex'=>'Họ tên không được có kí tự đặc biệt',
                        'name.max'=>'Họ tên quá dài',
                        'email.required'=>'Vui lòng nhập email',
                        'email.email'=>'Không đúng định dạng email',
                        'email.max'=>'Email quá dài',
                        'phone.required'=>'Vui lòng nhập số điện thoại',
                        'phone.regex'=>'Mobile phải bắt đầu bằng số 0 và mobile có có 10 số',
                        'phone.numeric'=>'Mobile phải là số',
                        'address.required'=>'Vui lòng nhập địa chỉ',
                        'address.regex'=>'Địa chỉ không được có kí tự đặc biệt',
                        'address.max'=>'Địa chỉ quá dài',
                        'province.numeric'=>'Chọn thành phố',
                        'village.numeric'=>'Chọn quận(huyện)',
                        'district.numeric'=>'Chọn phường(xã)',
                    ]
                );
                $province = Province::find($request->province);
                $district = District::find($request->district);
                $village = Village::find($request->village);
                $address = $request->address.",".$village->name.",".$district->name.",".$province->name;
                $array = Order::create([
                    'customer_id'=>null,
                    'payment'=>$request->payment,
                    'note'=>$request->notes,
                    'status'=>0,
                    'phone'=>$request->phone,
                    'address'=> $address,
                    'name'=>$request->name,
                    'email'=>$request->email,
                ]);
                $order = Order::find($array->id);
                $data = array('email'=>$request->email,'cart'=>Session('cart')->products,'date'=>Carbon::now('Asia/Ho_Chi_Minh'),'total'=>Session('cart')->totalPrice+$request->shipping,'address'=>$address,'phone'=>$request->phone,'name'=>$request->name,'mahoadon'=>$array->id,'tax'=>$request->shipping);
                Mail::send('user.dathang.template.mail_purchase',$data,
                    function($messenger) use ($data){
                        $messenger->to($data["email"],'Hệ thống')->subject('[Alley Baker] Đơn hàng của bạn?');
                });
            }
        }
        if($request->payment==1)
        {
                session(['cost_id' => $request->id]);
                session(['url_prev' => url()->previous()]);
                $vnp_TmnCode = "EOGCBMO4"; //Mã website tại VNPAY 
                $vnp_HashSecret = "XJGOTNOGROZCWMCRJRBIDUBFTCPMGMWD"; //Chuỗi bí mật
                $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost:8000/checkout";
                $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = $request->order_desc."0123456789";
                $vnp_OrderType = 'billpayment';
                if($request->shipping!=null)
                {
                    $vnp_Amount = (Session::get('cart')->totalPrice + $request->shipping)*100;
                    
                }
                else
                {
                    $vnp_Amount = ($point>=200) ? Session::get('cart')->totalPrice*100 : (Session::get('cart')->totalPrice + 50000)*100;
                }
                
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
                return redirect($vnp_Url);
        }
        else
        {
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
            $request->session()->forget('transaction_id');
            return view('user.dathang.template.success_checkout');
        }
    }
    public function listAddress(Request $request)
    {
        if($request->ajax())
        {
            $provence = Province::all();
            if($request->selectedProvince!=null&&$request->selectedDistrict==null)
            {
                $id = (int)$request->selectedProvince;
                $district = Province::find($id);
                $district = $district->Districts()->get();
                return view('user.dathang.template.address',compact('provence','district'));
            }
            else if($request->selectedDistrict!=null&&$request->selectedProvince!=null)
            {
                $idProvince = (int)$request->selectedProvince;
                $idDistrict = (int)$request->selectedDistrict;
                $district = Province::find($idProvince)->Districts()->get();
                $village = District::find($idDistrict)->Villages()->get();
                
                if($request->selectedVillage!=null)
                {
                    $idVillage = (int)$request->selectedVillage;
                    $shipping = Village::find($idVillage);
                    return view('user.dathang.template.address',compact('provence','district','village','shipping'));
                }
                else
                {
                    return view('user.dathang.template.address',compact('provence','district','village'));
                }
            }
        }
    }
}
