<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormLogin;
use App\Http\Requests\User\FormResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassword;
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
    public function login(  FormLogin $request)
    {
    	$validated = $request->validated();
    	try{
    		if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']])){
                // xử lí nếu là user
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

    // Xử lí đăng xuất,xóa session
    public function logout(Request $request)
    {
    	$request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function sendMail_resetPassword(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required|email'
            ],

            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
            ]
        );
        $code = randomCode(6);
        Cookie::queue('code',$code,1);
        User::where('email',$request->email)->update(['remember_token'=>$code]);
        $user = User::where('email',$request->email)->get(['id','name']);
        $data = array();
        foreach ($user as $data ) {
            $data = array('email'=>$request->email,'code'=>$code,'name'=>$data["name"],'id'=>Hash::make($data["id"]));
        }
        Mail::send('user.dangnhap.template.mail_template',$data,
            function($messenger) use ($data){
                $messenger->to($data["email"],'Hệ thống')->subject('[Alley Baker] Quên mật khẩu?');
        });
        return back()->with('success','Gửi xác nhận thành công');
    }

    public function newPassword(FormResetPassword $request)
    {
        $code = Cookie::get('code');
        if(!empty($code)){
            $validated = $request->validated();
            try{
                $bool = User::where('remember_token',$code)->update(
                    [
                        'password'=>Hash::make($request->password),
                    ]
                );
                if($bool){
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
