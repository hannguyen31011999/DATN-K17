<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormLogin;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class LoginController extends Controller
{
    //View login
    public function index()
    {
    	return view('admin.dangnhap.login');
    }

    public function login(FormLogin $request)
    {
    	$validated = $request->validated();
    	try{
    		if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']])){
    			if(Auth::User()->role==0){
    				$request->session()->put('email',Auth::User()->email);
                	$request->session()->put('id',Auth::User()->id);
                	return view('admin.trangchu.dashboard');
    			}else{
    				echo 123;die;
    			}
            }else{
            	return back()->with('error','Mật khẩu hoặc tài khoản không đúng');
            }
    	}catch(Exception $e){

    	}
    }

    public function logout(Request $request)
    {
    	$request->session()->flush();
        Auth::logout();
        return redirect('/admin/login');
    }
}
