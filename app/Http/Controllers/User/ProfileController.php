<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
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
		return view('user.thongtin.account',compact('user'));
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
}
