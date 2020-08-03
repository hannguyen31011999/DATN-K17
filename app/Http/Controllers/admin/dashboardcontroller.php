<?php
namespace App\Http\Controllers\admin;
use Validator;
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
        $a=Carbon::now();
        $format=date('Y-m-d 0:0:0');
        //Số lương đơn hàng mới
        $odernew= DB::table('Order')->where('created_at','>',$format)->count();
        //Đơn hang chưa xác nhận
        $odercxd= Order::where('status',0)->get();
        //Tổng đơn hàng
        $thang=Carbon::now()->month;
        $nam=Carbon::now()->year;
        $oddetail = DB::select(
            "SELECT
                SUM(product_price) as tong
            FROM
                `order_detail` AS o,
                `order` AS v
            WHERE
                YEAR(o.created_at) =  $nam  AND MONTH(o.created_at) = $thang  AND o.`bill_id` = v.`id` AND `status` = 2
            GROUP BY
                MONTH(o.created_at)
            ORDER BY
                SUM(product_price)");
        //Bình lận gần nhất
        $commet = comment::orderBy('created_at', 'desc')->take(5)->where('status',0)->get();    
        //Đơn hàng
        //Người dung gần nhất
        $user_nearest = User::orderBy('created_at', 'desc')->take(5)->where('status',1 )->where('role',1)->get();
        //Tổng đơn hàng
        $sloder = Order::all()->count();
        //Tổng người dung 
        $sluser = User::where('role',1)->count();
        //Người dùng mới
        $usernew = DB::table('User')->where('created_at','>',$format)->count();
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
         //Số lượng thành viên
        $slmember = Member::all()->count();
        //sản phẩm gần đây
        $product_nearest = Product::orderBy('created_at', 'desc')->take(5)->get();
    
        return view('admin.trangchu.dashboard',
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
            'listtypeproduct'
            )
        );
    }
  
}
