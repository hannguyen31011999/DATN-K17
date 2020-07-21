<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('admin/*'))
        {
            if(Auth::check()&&Auth::User()->role==2)
            {
                return $next($request);
            }
            return redirect('login');
        }
        else{
            if(Auth::check()&&Auth::User()->role==1)
                return $next($request);
            return redirect('account/login');
        }
    }
}
