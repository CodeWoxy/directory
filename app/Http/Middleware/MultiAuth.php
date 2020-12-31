<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // dd(Auth::guard($guard)->check());
        if ($guard == "admin") {

            if(Auth::guard($guard)->check()){
                return $next($request);
            }else{
                return redirect('admin/')->with('error', 'Session Expired! Kindly login again.');
            }

        } else if ($guard == "company") {

            if(Auth::guard($guard)->check()){

                return $next($request);
            }else{
                return redirect('prof/')->with('error', 'Session Expired! Kindly login again.');
            }
        }
    }
}
