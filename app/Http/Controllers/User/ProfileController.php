<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\FormPassword;
use App\Http\Requests\User\FormAddress;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
	private $id;

	public function __construct()
	{
		$this->middleware('CheckLogin');
	    $this->middleware(function ($request, $next) {
	        $this->id = Auth::user()->id;
	        return $next($request);
	    });

	}

	public function index()
	{
		$user = User::find($this->id);
		$user->phone = convert_phone($user->phone);
		return view('user.thongtin.profile',compact('user'));
	}

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
				return response()->json(['data'=>'Thay đổi mật khẩu thành công'],200);
			}catch(Exception $e){
				return response()->json(['data'=>'Thay đổi mật khẩu thất bại'],500);
			}
		}
	}

	public function view_address()
	{
		$user = User::find($this->id);
		return view('user.thongtin.address',compact('user'));
	}

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
}
