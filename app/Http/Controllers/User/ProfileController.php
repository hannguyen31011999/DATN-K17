<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class ProfileController extends Controller
{
	public function index()
	{
		$user = User::find(Auth::User()->id);
		$user->phone = convert_phone($user->phone);
		return view('user.thongtin.account',compact('user'));
	}
}
