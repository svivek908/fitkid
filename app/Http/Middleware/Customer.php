<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;
class Customer
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
       if (!Auth::guard('customer')->user()) {
            return redirect()->route('user_login')->with('emessage','Please login first');
        }
       
       return $next($request);
    }
}
