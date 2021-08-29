<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Cases;
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
    public function create() {
        //return view('officers.officer_landing_page');
        return View::make('registrar\create_case');

    }

    public function add(Request $request)
    {
        //return $request->input();
        $Cases = new Cases;
        $request->validate([
            'suspect_name'=>'required',
            'case_judge'=>'required',
            'courtroom'=>'required',
            'time'=>'required',
            'activity'=>'nullable|required',
            'outcome'=>'required',
            'type'=>'required',
            'photo'=>'nullable|required',
            'case_description'=>'nullable|required',
            'case_notes'=>'nullable|required',
            'date'=>'required',
            'plea'=>'required',
        ]);

        $query = DB::table('cases')->insert([
            'suspect_name' => $request->input('suspect_name'),
            'case_judge'   => $request->input('case_judge'),
            'courtroom'   => $request->input('courtroom'),
            'time'   => $request->input('time'),
            'type'   => $request->input('type'),
            'case_description'   => $request->input('case_description'),
            'case_notes'   => $request->input('case_notes'),
            'date'   => $request->input('date'),
            'plea'   => $request->input('plea'),
        ]);

        if($query){
            echo 'yes';
        }else{
            echo 'no';
        }

        /*$Cases->suspect_name     = $request->input('suspect_name');
        $Cases->case_judge       = $request->input('case_judge');
        $Cases->courtroom        = $request->input('courtroom');
        $Cases->time             = $request->input('time');
        $Cases->type             = $request->input('type');
        $Cases->case_description = $request->input('case_description');
        $Cases->case_notes       = $request->input('case_notes');
        $Cases->date             = $request->input('date');
        $Cases->plea             = $request->input('outcome');        
        $Cases->save();

        $plea = $request->input('outcome');
        
        if ($plea == "Guilty"){
            return View::make('registrar\registrar_landing_page');

        }else{
            echo 'venom';
        }
        return redirect()->back()->with('status','Record Added Successfully');*/
    }

    public function view()
    {
        $Cases = Cases::all();
        return view('registrar\view_cases')->with('cases',$Cases);
    }
}

