<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
class Ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,..$levels)
    {
      if (Auth::check() && Auth::user()->level == $levels)) {
     return $next($request);
    }
    return redirect('/')
}
