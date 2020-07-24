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
            if(!empty($request->keyword))
            {
                $list = Product::where('unit_price',$request->keyword)
                                ->orWhere('product_name','LIKE', '%'.$request->keyword.'%')
                                ->get(['id','product_name']);
                return view('user.template.seach',compact('list'));
            }
            else
            {
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
            }
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