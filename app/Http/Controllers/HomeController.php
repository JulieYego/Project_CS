<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
        //return view('officers.edit_suspect');
        //return view('officers.officer_landing_page');
        //return view('test');
    }

    public function registrar()
    {
        return view('registrar.landing_page');
        //return view('officers.edit_suspect');
        //return view('officers.officer_landing_page');
        //return view('test');
    }
    
    public function court_clerk()
    {
        return view('court_clerk.landing_page');
        //return view('officers.edit_suspect');
        //return view('officers.officer_landing_page');
        //return view('test');
    }
}
