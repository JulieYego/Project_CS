<?php

namespace App\Http\Controllers\Ocs;

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
        return View::make('Ocs\ocs_landing_page');
    }

    public function new() {
        return View::make('Ocs\ocs');
    }

    public function create()
    {
        return view('Ocs\create');     
    }

    public function book()
    {
        return view('Ocs\view_suspects_ocs');     
    }

    public function view(){
        $officers = user::all();
        return view('ocs.view_officer')->with('officers',$officers);
    }

    public function search(){
        return view('search');
    }
}
