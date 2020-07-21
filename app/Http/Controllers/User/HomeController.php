<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Cart;
class HomeController extends Controller
{
    // View trang chủ
    public function index(Request $request)
    {
    	$product = Product::paginate(8);
        $item = Cart::content();
    	$newProduct = Product::where('created_at','!=',null)
    						->orderBy('created_at','desc')
    						->take(4)
                            ->get();
    	if($request->ajax()){
    		return view('user.trangchu.template.content',compact('product','newProduct','item'));
    	}
    	return view('user.trangchu.index',compact('product','newProduct','item'));
    }
}
