<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class checkAdmin
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
        if($request->is(['shopping-cart','checkout']))
        {
            if(Auth::check()&&Auth::User()->role==2)
            {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
