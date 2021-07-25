<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class OcsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
          if(Auth::user()->isOfficer())
          {
            return redirect(route('officer.officer_landing_page'));
          }  
          elseif(Auth::user()->isOcs())
          {
            return $next($request);
          }   
        }
        abort(404);//for other user
    }

}
