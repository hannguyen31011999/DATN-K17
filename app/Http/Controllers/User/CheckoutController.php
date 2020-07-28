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
use Cart;
use Mail;
class CheckoutController extends Controller
{
	// View shopping-cart
    public function index()
	{
		$cart = Cart::content();
		return view('user.dathang.shoppingcart',compact('cart'));
	}

	// Update qty sản phẩm ở shopping-cart
	public function update(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->qty!=0){
    			Cart::update($request->rowId,$request->qty);
	    		$cart = Cart::content();
	    		return view('user.dathang.template.table-cart',compact('cart'));
    		}
    		else{
    			Cart::remove($request->rowId);
	    		$cart = Cart::content();
	    		return view('user.dathang.template.table-cart',compact('cart'));
    		}
    	}
    }

    // Xóa 1 sản phẩm ở shopping-cart
    public function delete(Request $request)
    {
    	if($request->ajax())
    	{
    		Cart::remove($request->rowId);
    		$cart = Cart::content();
    		return view('user.dathang.template.table-cart',compact('cart'));
    	}
    }

    // View checkout
    public function viewCheckout()
    {
    	$cart = Cart::content();
    	if(Auth::check())
    	{
    		$user = User::find(Auth::User()->id);
    		return view('user.dathang.checkout',compact('cart','user'));
    	}
    	return view('user.dathang.checkout',compact('cart'));
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
                    'email'=>Auth::User()->email
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
            $data = array('email'=>$request->email,'cart'=>Cart::content(),'date'=>Carbon::now('Asia/Ho_Chi_Minh'),'total'=>Cart::subtotal(0,'.','.'));
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
    			'email'=>$request->email
    		]);
    		$order = Order::find($array->id);
    	}
    	foreach (Cart::content() as $cart) {
			$order->OrderDetails()->create(['product_id'=>$cart->id,'qty'=>$cart->qty,'product_price'=>$cart->price]);
		}
    	Cart::destroy();
    	return redirect()->route('home');
    }
}
