<?php

namespace App\Http\Controllers\Ocs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

      public function index() {
        return view('Ocs\ocs_landing_page');
    }
}
