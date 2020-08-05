<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FormRegister;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Hash;
class RegisterController extends Controller
{
    
    // View register
    public function index()
    {
        return view('user.dangki.register');
    }

    // Xử lí đăng kí
    public function register(FormRegister $request)
    {
        // tạo một form request
        $validated = $request->validated();
        try{
            // create tài khoản
            $user = User::create([
                'email'=>$validated['email'],
                'password'=>Hash::make($validated['password']),
                'name'=>$validated['fullname'],
                'sex'=>2,
                'phone'=>$validated['phone'],
                'role'=>1,
                'status'=>1
            ]);
            // Nếu tạo thành công thì login
            if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']]))
            {
                $request->session()->put('email',Auth::User()->email);
                $request->session()->put('id',Auth::User()->id);
                $request->session()->put('role',Auth::User()->role);
                return redirect()->route('home');
            }
        }catch(Exception $e){
            return redirect('/account/register')->with('error','Đăng kí thất bại');
        }
    }
}
