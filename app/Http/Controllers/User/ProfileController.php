<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\FormPassword;
use App\Http\Requests\User\FormAddress;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
	private $id;

	// Khởi tạo id khi đăng nhập thành công
	public function __construct()
	{
		$this->middleware('CheckLogin');
	    $this->middleware(function ($request, $next) {
	        $this->id = Auth::user()->id;
	        return $next($request);
	    });

	}

	// View profile
	public function index()
	{
		$user = User::find($this->id);
		$user->phone = convert_phone($user->phone);
		if(Auth::User()->role==1)
		{
			$point = $user->Members()->pluck('point')[0];
			return view('user.thongtin.profile',compact('user','point'));
		}
		return view('admin.thongtin.profile',compact('user'));
	}

	// Xử lí thay đổi thông tin
	public function change_profile(Request $request)
	{
		if($request->ajax()){
			try{
				$user = User::find($this->id);
				$user->update([
					'name'=>$request->name,
					'sex'=>$request->gender,
					'birthdate'=>$request->birthdate,
					'address'=>$request->address,
				]);
				return response()->json(['data'=>'Cập nhật thông tin thành công'],200);
			}catch(Exception $e){
				return response()->json(['data'=>'Cập nhật thông tin thất bại'],500);
			}
		}
	}

	// Xử lí thay đổi password
	public function change_password(FormPassword $request)
	{
		// ajax response errors status 422
		if($request->ajax()){
			$validated = $request->validated();
			try{
				$user = User::find($this->id);
				$user->update([
					'password'=>Hash::make($validated["new_password"]),
				]);
				if($user->role==2)
				{
					return response()->json(['data'=>'Thay đổi mật khẩu thành công','url'=>'http://localhost:8000/admin/profile'],200);
				}
				return response()->json(['data'=>'Thay đổi mật khẩu thành công','url'=>'http://localhost:8000/account/profile'],200);
			}catch(Exception $e){
				return response()->json(['data'=>'Thay đổi mật khẩu thất bại'],500);
			}
		}
	}

	// View địa chỉ
	public function view_address()
	{
		$user = User::find($this->id);
		return view('user.thongtin.address',compact('user'));
	}

	// Update địa chỉ và sdt
	public function UpdateAddress(FormAddress $request)
	{
		if($request->ajax()){
			$validated = $request->validated();
			try{
				$user = User::find($this->id);
				$user = $user->update([
					'phone'=>$validated["phone"],
					'address'=>$validated["address"],
				]);
				return response()->json([
					'phone'=>$validated["phone"],
					'address'=>$validated["address"],
				],200);
			}catch(Exception $e){
				return response()->json(['data'=>'Thay địa chỉ thành công'],500);
			}
		}
	}

	public function viewPurchase()
	{
		$order = User::find(Auth::User()->id)
				->Orders()
				->orderBy('created_at','desc')
				->get();
		return view('user.thongtin.purchase',compact('order'));
	}

	public function deletePurchase($id)
	{
		$order = Order::find($id);
		$order->delete();
		$order = User::find(Auth::User()->id)
				->Orders()
				->orderBy('created_at','desc')
				->get();
		return view('user.thongtin.purchase',compact('order'));
	}

	public function detailPurchase($id)
	{
		$priceShip = 0;
		$order = null;
		$member = User::find($this->id)->Members()->get(['point','created_at']);
		$total = Order::where('order.id',$id)
    				->join('order_detail','order_detail.bill_id','order.id')
    				->select(
    					DB::raw('sum(order_detail.qty*order_detail.product_price) as total'))
    				->groupBy('order.id')
    				->get();
		$temp = Order::where('id',$id)
						->whereDate('created_at','>',$member[0]->created_at)
						->get();
		$product = Product::all();
		if($member[0]->point>=200)
		{
			if($temp->isEmpty())
			{
				$order = Order::find($id)->OrderDetails()->get();
				$priceShip += 50000;
				return view('user.thongtin.detail_purchase',compact('product','order','total','priceShip'));
			}
			else
			{
				$order = Order::find($id)->OrderDetails()->get();
				return view('user.thongtin.detail_purchase',compact('product','order','total','priceShip'));
			}
			
		}
		else
		{
			$order = Order::find($id)->OrderDetails()->get();
			$priceShip += 50000;
			return view('user.thongtin.detail_purchase',compact('product','order','total','priceShip'));
		}
	}
}
