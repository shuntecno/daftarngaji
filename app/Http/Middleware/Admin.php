<?php

namespace App\Http\Middleware;

use Closure;
use auth;
class Admin
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
      if (Auth::check() && Auth::user()->level != '3') {
     return $next($request);
   }elseif (Auth::check() && Auth::user()->level != '4') {
      return $next($request);
   }elseif (Auth::check() && Auth::user()->level != '5') {
      return $next($request);
   }
      return redirect('/');
    }

}
