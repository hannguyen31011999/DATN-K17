<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormLogin;
use App\Http\Requests\User\FormResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassword;
use App\Rules\CheckEmail;
use App\Model\User;
use Mail;
use Hash;
use Cookie;
class LoginController extends Controller
{
    //View login
    public function index()
    {
    	return view('user.dangnhap.login');
    }

    // Xử lí đăng nhập
    public function login(FormLogin $request)
    {
    	$validated = $request->validated();
    	try{
    		if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']])){
                $request->session()->put('email',Auth::User()->email);
                $request->session()->put('id',Auth::User()->id);
                $request->session()->put('role',Auth::User()->role);
                // xử lí nếu là user
    			if(Auth::User()->role==1){
                    if(Auth::User()->status!=1)
                    {
                        Auth::logout();
                        return back()->with('error','Tài khoản bị khóa');
                    }
                    else{
                        if($request->session()->has('urlAction'))
                        {
                            return redirect($request->session()->get('urlAction'));
                        }
                        return redirect()->route('home');
                    }
    			}else{
                    return redirect()->route('dashboard');
    			}
            }else{
            	return back()->with('error','Mật khẩu hoặc tài khoản không đúng');
            }
    	}catch(Exception $e){

    	}
    }

    // Xử lí đăng xuất,xóa session
    public function logout(Request $request)
    {
        $request->session()->forget('email');
        $request->session()->forget('id');
        $request->session()->forget('urlAction');
        $request->session()->forget('role');
        if(empty(Auth::User()->role))
        {
            return redirect('/')->with('timeLogin','Tài khoản hết hạn đăng nhập');
        }
        else
        {
            if(Auth::User()->role==1)
            {
                Auth::logout();
                return redirect('account/login');
            }
            else{
                Auth::logout();
                return redirect('login');
            }
        }
    }

    // Xử lí gửi mail lấy lại mật khẩu
    public function sendMail_resetPassword(Request $request)
    {
        $validated = $this->validate($request,
            [
                'email'=>['required','email',new CheckEmail]
            ],

            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
            ]
        );
        $code = randomCode(6);
        $view = 'user.dangnhap.template.mail_template';
        Cookie::queue('code',$code,1);
        User::where('email',$request->email)->update(['remember_token'=>$code]);
        $user = User::where('email',$request->email)->get(['id','name','role']);
        $data = array();
        foreach ($user as $data) {
            if($data['role']==2)
            {
                $view = 'admin.dangnhap.template.mail_template';
            }
            $data = array('email'=>$request->email,'code'=>$code,'name'=>$data["name"],'id'=>Hash::make($data["id"]));
        }
        Mail::send($view,$data,
            function($messenger) use ($data){
                $messenger->to($data["email"],'Hệ thống')->subject('[Alley Baker] Quên mật khẩu?');
        });
        return back()->with('success','Gửi xác nhận thành công');
    }

    // Xử lí cookie và đặt lại mật khẩu
    public function newPassword(FormResetPassword $request)
    {
        $code = Cookie::get('code');
        if(!empty($code)){
            $validated = $request->validated();
            try{
                $user = User::where('remember_token',$code)->get(['role']);
                $bool = User::where('remember_token',$code)->update(
                    [
                        'password'=>Hash::make($request->password),
                    ]
                );
                foreach ($user as $value) {
                    if($value["role"]==2)
                        return redirect('login');
                    return redirect('account/login'); 
                }
                return back()->with('notifi','Thay đổi mật khẩu thất bại');
            }catch(Exception $e){

            }
        }
        else{
            return back()->with('notifi','Mã xác nhận quá thời hạn');
        }
    }
}
