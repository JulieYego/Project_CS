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
        $Cases->c_number          = $request->input('c_number');
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

    public function schedule() {
        //return view('officers.officer_landing_page');
        return View::make('registrar\schedule_case');
    }

    public function edit_cases($id) {
        $data = Cases::find($id);
        return view('registrar\edit_case',['data'=>$data]);
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

    /*public function cases(){
        return Datatables::of(Cases::query())->make(true);
    }*/
    public function cases(Request $request){
        if($request -> ajax()){
            $data = Cases::latest() -> get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('date', function ($request) {
                return $request->date->format('Y-m-d'); // human readable format
            })
            ->editColumn('time', function ($request) {
                return $request->time->toTimeString(); // human readable format
            })
            ->rawcolumns(['action'])
            ->make(true);
        }
        return view('registrar\view_cases');
    }

    public function view_scheduled(Request $request){
        if($request -> ajax()){
            $data = Cases::select('*') ->where('case_status', 'Open');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('hearing_date', function ($request) {
                    return $request->hearing_date->format('Y-m-d'); // human readable format
                })
                ->editColumn('hearing_time', function ($request) {
                    return $request->hearing_time->toTimeString(); // human readable format
                })
                ->addColumn('action', function ($row) {
                    return '<a href="edit_cases/'.$row->id.'" class="btn btn-outline-warning edit"><i class="glyphicon glyphicon-edit"></i> Update</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('registrar\view_scheduled');
    }

    public function update(Request $request){
        //return $req->input();
        $Cases = new Cases;
        $activities = $request->input('activity');

        $Cases->id         = $request->input('case_number');
        $Cases->suspect_name = $request->input('suspect_name');
        $Cases->accussor    = $request->input('accusor');
        $Cases->defendant  = $request->input('defendant');
        $Cases->case_judge = $request->input('case_judge');
        $Cases->courtroom  = $request->input('courtroom');
        $Cases->case_notes = $request->input('case_notes');
        $Cases->type        = $request->input('type');
        $Cases->date       = $request->input('date');
        $Cases->time       = $request->input('time');
        $Cases->witnesses  = $request->input('witnesses');
        $Cases->outcome    = $request->input('outcome');
        $Cases->activity   = $request->input('activity');
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
        if($activities == "Ruling"){
            $Cases->case_status   = 'Closed';
        }else if($activities == "Hearing"){
            $Cases->case_status   = 'Open';
        }     
        $Cases->save();
        if($activities == "Ruling"){
            return redirect()->route('view_cases');
        }else if($activities == "Hearing"){
            return redirect()->route('schedule_case');
        }
    }
    
}
    
    
