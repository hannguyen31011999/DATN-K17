<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Model\OrderDetail;
use App\Model\Order;
class ThongKeController extends Controller
{
    //
    public function sumPriceByYear(Request $request)
    {
    	$range = Carbon::now()->year;
	    $total = Order::where('status',2)
	    				->join('order_detail','order_detail.bill_id','order.id')
	    				->select(
	    					DB::raw('sum(order_detail.qty*order_detail.product_price) as total'),
	    					DB::raw('MONTH(order.created_at) as month'))
	    				->groupBy('month')
	    				->get();
    	// $total = Order::where('status',2)->with('OrderDetails')->get()->pluck('OrderDetails');
    	return view('admin.list-admin.ds-thongke.doanhthu',compact('total'));
    }
}
