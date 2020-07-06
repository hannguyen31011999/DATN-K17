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

    public function register(FormRegister $request)
    {
        $validated = $request->validated();
        try{
            User::create([
                'email'=>$validated['email'],
                'password'=>Hash::make($validated['password']),
                'name'=>$validated['full_name'],
                'phone'=>$validated['phone'],
                'address'=>$validated['address'],
                'role'=>1,
                'status'=>1
            ]);
            if(Auth::attempt(['email'=>$validated['email'],'password'=>$validated['password']])){
                $request->session()->put('name',Auth::User()->email);
                $request->session()->put('id',Auth::User()->id);
                return redirect()->route('home');
            }
        }catch(Exception $e){
            return redirect('/account/register')->with('error','Đăng kí thất bại');
        }
    }
}
