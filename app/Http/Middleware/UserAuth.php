<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if (Auth::user()->role_id == 1) {
                return redirect('/admin');
            } else {
                if((Auth::user()->status == 1) || (Auth::user()->status == 0)){
                    return $next($request);
                }else{
                    return redirect('/login')->with('failed','You are not allowed to login please contact admin.');
                }

            }
        }else{
            return redirect('/login');
        }
    }
}
