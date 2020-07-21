<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Cart;
class CartController extends Controller
{
    // Thêm sản phẩm giỏ hàng
    public function addCart(Request $request)
    {
    	if($request->ajax())
    	{
    		// Cart::destroy();
	        $product = Product::find($request->id);
            $cart = [
                'id' => $product->id, 
                'name'=> $product->product_name,
                'price'=> $product->unit_price,
                'weight'=>0,
                'qty'=> 1,
                'options'=>[
                    'img'=> $product->image,
                    'unit'=>$product->unit,
                    'promotion_price'=> $product->promotion_price,
                ]
            ];
            if($product->promotion_price!=0)
            {
                $cart["price"] = $product->promotion_price;
            }
        	Cart::add($cart);
        	$item = Cart::content();
        	return view('user.template.cart',compact('item'));
        	// // return response()->json(['messages'=>"Đã thêm ".$product->product_name,'cart'=>$cart],200)->with('messages',"Đã thêm ".$product->product_name);
    	}
    }

    // Xóa 1 sản phẩm ở giỏ hàng
    public function delete(Request $request)
    {
    	if($request->ajax())
    	{
    		Cart::remove($request->rowId);
    		$item = Cart::content();
    		return view('user.template.cart',compact('item'));
    	}
    }
}
