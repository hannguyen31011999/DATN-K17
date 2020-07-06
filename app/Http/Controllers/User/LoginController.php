<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormLogin;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class LoginController extends Controller
{
    //View login
    public function index()
    {
    	return view('user.dangnhap.login');
    }

    public function login(FormLogin $request)
    {
    	$validated = $request->validated();
    	try{
    		if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']])){
    			if(Auth::User()->role==1){
    				$request->session()->put('email',Auth::User()->email);
                	$request->session()->put('id',Auth::User()->id);
                	return redirect()->route('home');
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
        return redirect('/');
    }
}
