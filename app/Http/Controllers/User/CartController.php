<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Session;
use App\ShoppingCart;
class CartController extends Controller
{
    public function update($id,Request $request)
    {
        if(Session::has('cart'))
        {
            $updateCart = new ShoppingCart(Session('cart'));
            $updateCart->updateCart($id,8);
            Session(['cart'=>$updateCart]);
        }
    }

    // Thêm sản phẩm giỏ hàng
    public function addCart(Request $request)
    {
        if($request->ajax())
        {
            $product = Product::find($request->id);
            if(!empty($product))
            {
                $oldCart = !empty(Session('cart')) ? Session('cart') : null;
                $newCart = new ShoppingCart($oldCart);
                if(empty($newCart->products[$request->id]))
                {
                    if($product->qty>1)
                    {
                        $newCart->AddCart($product,$request->id);
                        Session(['cart'=>$newCart]);
                        return view('user.template.cart');
                    }
                    else
                    {
                        return "fail";
                    }
                }
                else
                {
                    if($product->qty >= ($newCart->products[$request->id]['qty']+1))
                    {
                        $newCart->AddCart($product,$request->id);
                        Session(['cart'=>$newCart]);
                        return view('user.template.cart');
                    }
                    else
                    {
                        return "fail";
                    }
                }
            }
        }
    }

    // Xóa 1 sản phẩm ở giỏ hàng
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
            return view('user.template.cart');
        }
    }
}
