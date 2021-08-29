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
        $Cases = new Cases;
        $request->validate([
            'suspect_name'=>'required',
            'case_judge'=>'required',
            'courtroom'=>'required',
            'time'=>'required',
            'activity'=>'required',
            'outcome'=>'required',
            'type'=>'required',
            'photo'=>'nullable|required',
            'case_description'=>'nullable|required',
            'case_notes'=>'nullable|required',
        ]);
        $Cases->suspect_name = $request->input('suspect_name');
        $Cases->case_judge = $request->input('case_judge');
        $Cases->courtroom = $request->input('courtroom');
        $Cases->time = $request->input('time');
        $Cases->activity = $request->input('activity');
        $Cases->outcome = $request->input('outcome');
        $Cases->type = $request->input('type');
        if($request->hasfile('photo')){
            $file      = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename  = time(). '.' . $extention;
            $file->move('uploads/suspect/',$filename);
            $Cases->photo = $filename;
        }else{
            return $request;
            $Cases->photo = '';
        }        
        $Cases->case_description = $request->input('case_description');
        $Cases->case_notes = $request->input('case_notes');
        $Cases->save();
        return redirect()->back()->with('status','Record Added Successfully');
    }
}

