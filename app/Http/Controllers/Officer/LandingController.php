<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LandingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //return view('officers.officer_landing_page');
        return View::make('officers\officer_landing_page');

    }



    
}
