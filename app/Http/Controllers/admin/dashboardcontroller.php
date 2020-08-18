<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\User;
use App\Model\Member;
use App\Model\Comment;
use App\Model\News;
use App\Model\OrderDetail;
use Carbon\Carbon;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $listtypeproduct = TypeProduct::all();
        $product = Product::all();
        $user = User::all();
        $a = Carbon::now();
        $format = date('Y-m-d 0:0:0');
        //Số lương đơn hàng mới
        $odernew = DB::table('order')->where('created_at', '>', $format)->count();
        //Đơn hang chưa xác nhận
        //$oder_cxd = Order::orderBy('created_at', 'desc')->where('status', 0)->get();
        //Tổng đơn hàng
        $thang = Carbon::now()->month;
        $nam = Carbon::now()->year;
        $oddetail  = Order::where('status',2)
                    ->join('order_detail','order_detail.bill_id','order.id')
                    ->select(
                        DB::raw('sum(order_detail.qty*order_detail.product_price) as total'),
                        DB::raw('MONTH(order.created_at) as month'))
                    ->whereMonth('order.created_at','=',$thang)
                    ->groupBy('month')
                    ->get();
        $odercxd = Order::where('status',0)
                    ->where('order.deleted_at',null)
                    ->join('order_detail','order_detail.bill_id','order.id')
                    ->select(
                        DB::raw('sum(order_detail.qty*order_detail.product_price) as total , order.id'))
                    ->groupBy('order.id')
                    ->get();
        //Bình luận gần nhất
        $commet = comment::orderBy('created_at', 'desc')->take(5)->where('status', 0)->get();

        //Đơn hàng
        //Người dung gần nhất
        $user_nearest = User::orderBy('created_at', 'desc')->take(5)->where('status', 1)->where('role', 1)->get();
        //Tổng đơn hàng
        $sloder = Order::all()->count();
        //Tổng người dung 
        $sluser = User::where('role', 1)->count();
        //Người dùng mới
        $usernew = DB::table('User')->where('created_at', '>', $format)->count();
        //Tổng sản phẩm
        $slProduct = Product::all()->count();
        //Tổng loại sản phẩm
        $slTypeProduct = TypeProduct::all()->count();
        //Tổng bình luận mới
        $slComment = Comment::all()->count();
        //Tổng thành viên 
        $slMember = Member::all()->count();
        //Tong bài viết
        $slNews = News::all()->count();
        //Bài viết mới 
        $new_nearest = News::orderBy('updated_at', 'desc')->take(3)->get();
        //Số lượng thành viên
        $slmember = Member::all()->count();
        //sản phẩm gần đây
        $product_nearest = Product::orderBy('updated_at', 'desc')->take(3)->get();


       

        $range = Carbon::now()->subDays(7);
      
        $orderYear = DB::table('order')
          ->where('created_at', '>=', $range)
          ->groupBy('date')
          ->orderBy('date', 'ASC')
          ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value')
          ]);
        return view(
            'admin.trangchu.dashboard',
            compact(
                'sluser',
                'sloder',
                'slProduct',
                'slTypeProduct',
                'slComment',
                'slMember',
                'slNews',
                'odernew',
                'usernew',
                'slmember',
                'odercxd',
                'oddetail',
                'commet',
                'user',
                'product',
                'user_nearest',
                'product_nearest',
                'listtypeproduct',
                'new_nearest',
                'orderYear'
            )
        );
    }
}
