<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Cases;
use App\DataTables\casesDataTable;
use DataTables;

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
        $plea  = $request->input('plea');

        $Cases->suspect_name      = $request->input('suspect_name');
        $Cases->case_judge        = $request->input('case_judge');
        $Cases->courtroom         = $request->input('courtroom');
        $Cases->type              = $request->input('type');
        $Cases->case_description  = $request->input('case_description');
        $Cases->case_notes        = $request->input('case_notes');
        $Cases->time              = $request->input('time');
        $Cases->date              = $request->input('date');
        $Cases->plea              = $request->input('plea');
        $Cases->activity          = $request->input('activity');
        $Cases->outcome           = $request->input('outcome');
        if($plea == "Guilty"){
            $Cases->case_status   = 'Closed';
        }else if($plea == "Not guilty"){
            $Cases->case_status   = 'Open';
        }     
        $Cases->save();
        if($plea == "Guilty"){
            return redirect()->route('view_cases');
        }else if($plea == "Not guilty"){
            return redirect()->route('schedule_case');
        } 
    }

    public function view()
    {
        $Cases = Cases::all();
        return view('registrar\view_cases')->with('Cases',$Cases);
    }

    public function cases(casesDataTable $dataTable){
        return $dataTable->render('cases');
    }

    public function getCases(Request $request)
    {
        if ($request->ajax()) {
            $data = Cases::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="#" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('registrar\view_case');
    }

    public function schedule() {
        //return view('officers.officer_landing_page');
        return View::make('registrar\schedule_case');
    }

    public function track() {
        //return view('officers.officer_landing_page');
        return View::make('registrar\track_case');
    }

    public function schedule_case(Request $request){
        $id = $request->input('case_number');
        echo $id;
        $schedue = DB::table('cases')
              ->where('id', $id)
              ->update(['hearing_time' => $request->input('time'),'hearing_date' => $request->input('date'),'hearing_courtroom' => $request->input('courtroom')]);
        return redirect()->route('view_cases');         
    }
}
