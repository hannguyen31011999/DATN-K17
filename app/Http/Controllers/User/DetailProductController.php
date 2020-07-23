<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\OrderDetail;
use App\Model\Comment;
use App\Model\User;
use Cart;
class DetailProductController extends Controller
{
    //
    public function index($name = null , $id = null,Request $request)
    {
    	$product = Product::find($id);
    	$seller = OrderDetail::groupBy(['product_id','product_price'])
		    	->selectRaw('sum(qty) as total,product_id,product_price')
		    	->orderBy('total','desc')
		    	->take(4)
		    	->get();
		$newProduct = Product::where('deleted_at',null)
    						->orderBy('created_at','desc')
    						->take(4)
                            ->get();
        $productRelated = TypeProduct::find(Product::find($id)->type_product_id)
        							->Products()
        							->where('product_name','!=',$product->product_name)
        							->take(3)
        							->get();
        $data = Product::all();
        $item = Cart::content();
        $comment = Product::find($id)->Comments()->orderBy('id','asc')->get();
        $count = Product::find($id)->Comments()->count();
        $user = User::all();
        if($request->ajax())
    	{
    		if(Auth::check())
	    	{
	    		Comment::create([
	    			'user_id'=>Auth::User()->id,
	    			'product_id'=>$id,
	    			'content'=>$request->comment,
	    			'status'=>0
	    		]);
	    		$user = User::all();
	    		$comment = Product::find($id)->Comments()->orderBy('id','asc')->get();
	    		$count = Product::find($id)->Comments()->count();
	    		return view('user.chitietsanpham.template.content',compact('seller','newProduct','productRelated','data','product','item','comment','count','user'));
	    	}
	    	else
	    	{
	    		$request->session()->put('urlAction',$request->url());
	    		return response()->json(['url'=>'http://localhost:8000/account/login'],200);
	    	}
    	}
    	return view('user.chitietsanpham.detail_product',compact('seller','newProduct','productRelated','data','product','item','comment','count','user'));
    }

    public function deleteComment($name = null , $id = null,Request $request)
    {
    	if($request->ajax())
    	{
    		if(Auth::check())
	    	{
	    		Comment::where([
	    			['id',$request->commentId],
	    			['user_id',Auth::User()->id]
	    		])->delete();
	    		$product = Product::find($id);
		    	$seller = OrderDetail::groupBy(['product_id','product_price'])
				    	->selectRaw('sum(qty) as total,product_id,product_price')
				    	->orderBy('total','desc')
				    	->take(4)
				    	->get();
				$newProduct = Product::where('deleted_at',null)
		    						->orderBy('created_at','desc')
		    						->take(4)
		                            ->get();
		        $productRelated = TypeProduct::find(Product::find($id)->type_product_id)
		        							->Products()
		        							->where('product_name','!=',$product->product_name)
		        							->take(3)
		        							->get();
		        $data = Product::all();
		        $item = Cart::content();
		        $comment = Product::find($id)->Comments()->orderBy('id','asc')->get();
		        $count = Product::find($id)->Comments()->count();
		        $user = User::all();
	    		return view('user.chitietsanpham.template.content',compact('seller','newProduct','productRelated','data','product','item','comment','count','user'));
	    	}
    	}
    }
}
