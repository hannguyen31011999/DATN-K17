<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests\User\FormCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Order;
use App\Model\OrderDetail;
use Cart;
class CheckoutController extends Controller
{
    //

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
    public function createCheckout(FormCheckout $request)
    {
    	if(Auth::check())
    	{

    	}
    	else
    	{
    		$validated = $request->validated();
    		$array = $request->name.",".$request->gender.",".$request->email;
    		$array = Order::create([
    			'customer_id'=>null,
    			'payment'=>$request->payment,
    			'note'=>$request->notes,
    			'status'=>0,
    			'phone'=>$validated['phone'],
    			'address'=> $validated['address'],
    			'array'=>$array
    		]);
    		$order = Order::find($array->id);
    		foreach (Cart::content() as $cart) {
    			$order->OrderDetails()->create(['product_id'=>$cart->id,'qty'=>$cart->qty,'product_price'=>$cart->price]);
    		}
    		Cart::destroy();
    		return redirect()->route('home');
    	}
    }
}
