<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Guestid
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
        if(!Session::has('guest_id')){

            $randomnumber = rand(1000, 9999999);

            Session::put('guest_id','guest_'.$randomnumber);
        }


        return $next($request);
    }
}
