<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Auth;

class LandingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //return view('officers.officer_landing_page');
        return View::make('registrar\registrar_landing_page');

    }
}
