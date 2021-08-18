<?php

namespace App\Http\Controllers\Officer;

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
        return View::make('officers\officer_landing_page');

    }

    public function profile() {
        //return view('officers.officer_landing_page');
        $officers = Auth::user();
        return view('officers.profile')->with('officers',$officers);
    }

    public function search() {
        $search_text = $_GET('query');
        $search = user::where('first_name','LIKE','%'.$search_text.'%')->get();
        return view('officers.view_suspects' ,compact('search'));
    }
}
