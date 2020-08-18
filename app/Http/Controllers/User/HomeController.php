<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\OrderDetail;
use App\Model\Comment;
use App\Model\User;
class HomeController extends Controller
{
    // View trang chủ
    public function index(Request $request)
    {
    	$product = Product::paginate(8);
    	$newProduct = Product::where('deleted_at',null)
    						->orderBy('created_at','desc')
    						->take(4)
                            ->get();
        $count_product = Product::count();
    	if($request->ajax()){
            if(!empty($request->keyword))
            {
                $list = Product::where('unit_price',$request->keyword)
                                ->orWhere('product_name','LIKE', '%'.$request->keyword.'%')
                                ->get(['id','product_name']);
                return view('user.template.seach',compact('list'));
            }
            else
            {
                return view('user.trangchu.template.content',compact('product','newProduct','count_product'));
            }
    	}
    	return view('user.trangchu.index',compact('product','newProduct','count_product'));
    }

    // View loại sản phẩm
    public function typeProduct($name = null,$id = null,Request $request)
    {
        $newProduct = TypeProduct::find($id)
                    ->Products()
                    ->orderBy('created_at','desc')
                    ->take(3)
                    ->get();
        $product = TypeProduct::find($id)->Products()->paginate(6);
        $count_type = TypeProduct::find($id)->Products()->count();
        $data = Product::all();
        $seller = OrderDetail::groupBy(['product_id','product_price'])
                ->selectRaw('sum(qty) as total,product_id,product_price')
                ->orderBy('total','desc')
                ->take(10)
                ->get();
        if($request->ajax()){
            return view('user.loaisanpham.content',compact('product','newProduct','count_type','data','seller'));
        }
        return view('user.loaisanpham.type_product',compact('product','newProduct','count_type','data','seller'));
    }

    public function seach(Request $request)
    {
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
            $count_product = Product::where('product_name','LIKE', '%'.$url.'%')
                        ->orWhere('unit_price',$url)->count();
            return view('user.trangchu.template.content',compact('product','newProduct','item','url','count_product'));
        }
        else
        {
            $count_product = Product::where('product_name','LIKE', '%'.$url.'%')
                        ->orWhere('unit_price',$url)->count();
            $product = Product::where('product_name','LIKE', '%'.$request->get('keyword').'%')
                        ->orWhere('unit_price',$request->get('keyword'))
                        ->paginate(8);
            $messenger = "Không tìm thấy sản phẩm";
            if($product->isEmpty())
            {
                return view('user.trangchu.seach_product',compact('product','newProduct','url','messenger','count_product'));
            }
            return view('user.trangchu.seach_product',compact('product','newProduct','url','count_product'));
        }
    }
}
