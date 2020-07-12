<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\FormPassword;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
	private $id;

	public function __construct()
	{
		$this->middleware('auth');
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
}
