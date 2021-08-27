<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class RegistrarAuthenticated
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

          if(Auth::user()->isCourtClerk())
          {
            return redirect(route('court_clerk.court_clerk_landing_page'));
          }

          else if(Auth::user()->isOcs())
          {
            return route('ocs_landing_page');

          }
          else if(Auth::user()->isOfficer())
          {
            return redirect(route('officer.officer_landing_page'));
          }

          else if(Auth::user()->isRegistrar())
          {
            return $next($request);
          }

        }
        abort(404);//for other user 

    }
}
