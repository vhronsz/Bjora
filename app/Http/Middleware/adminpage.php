<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class adminpage
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
        dd(Session::get("user"));
        if(!Session::get("user")){
            return response("Unauthorized");
        }
        if(Session::get("user")->role === "admin"){
            return $next($request);
        }
        dd("aaa");
        return response("Unauthorized");
    }
}
