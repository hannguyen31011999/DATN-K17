<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\OrderDetail;
use App\Model\Comment;
use App\Model\User;
use Cart;
class HomeController extends Controller
{
    // View trang chủ
    public function index(Request $request)
    {
    	$product = Product::paginate(8);
        $item = Cart::content();
    	$newProduct = Product::where('deleted_at',null)
    						->orderBy('created_at','desc')
    						->take(4)
                            ->get();
    	if($request->ajax()){
    		return view('user.trangchu.template.content',compact('product','newProduct','item'));
    	}
    	return view('user.trangchu.index',compact('product','newProduct','item'));
    }

    // View loại sản phẩm
    public function typeProduct($name = null,$id = null,Request $request)
    {
        $item = Cart::content();
        $newProduct = TypeProduct::find($id)
                    ->Products()
                    ->orderBy('created_at','desc')
                    ->take(3)
                    ->get();
        $product = TypeProduct::find($id)->Products()->paginate(6);
        if($request->ajax()){
            return view('user.loaisanpham.content',compact('product','newProduct','item'));
        }
        return view('user.loaisanpham.type_product',compact('product','newProduct','item'));
    }

    public function seach(Request $request)
    {
        $item = Cart::content();
        $newProduct = Product::where('deleted_at',null)
                            ->orderBy('created_at','desc')
                            ->take(4)
                            ->get();
        $url = $request->get('keyword');
        if($request->ajax()){
            $url = $request->keyword;
            $product = Product::where('product_name','LIKE', '%'.$url.'%')
                        ->orWhere('unit_price',$url)
                        ->paginate(8);
            return view('user.trangchu.template.content',compact('product','newProduct','item','url'));
        }
        else
        {
            $product = Product::where('product_name','LIKE', '%'.$request->get('keyword').'%')
                        ->orWhere('unit_price',$request->get('keyword'))
                        ->paginate(8);
            $messenger = "Không tìm thấy sản phẩm";
            if($product->isEmpty())
            {
                return view('user.trangchu.seach_product',compact('product','newProduct','item','url','messenger'));
            }
            return view('user.trangchu.seach_product',compact('product','newProduct','item','url'));
        }
    }
}
