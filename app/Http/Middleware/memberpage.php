<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class memberpage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {if(!Session::get("user")){
        return response("Unauthorized");
    }
        if(Session::get("user")->role === "user" || Session::get("user")->role === "admin"){return $next($request);}
        return response("Unauthorized");
    }
}
