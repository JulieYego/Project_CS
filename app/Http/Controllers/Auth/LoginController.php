<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated(Request $request, $user)
    {
        // to officer dashboard
        if($user->isOfficer()) {
            return redirect(
                route('officer_landing_page')
            );
        // to ocs dashboard
        }else if($user->isOcs()) {
            return redirect(
                route('ocs_landing_page')
            ); 
        // to registrar dashboard
        }else if($user->isRegistrar()) {
            return redirect(
                route('registrar_landing_page')
            ); 
        // to court clerk dashboard
        }else if($user->isCourtClerk()) {
            return redirect(
                route('court_clerk_landing_page')
            );
        }
    }
    
    //protected $redirectTo = RouteServiceProvider::HOME;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}

