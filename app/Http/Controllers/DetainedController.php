<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetainedController extends Controller
{
    public function index(){
        return view('officers.officer_landing');
    }

    public function insert(Request $request){
        $detainee = new detainee;
        $request -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'IDnumber'   => 'required',
            'gender'     => 'required',
            'officer'    => 'required',
            'crime'      => 'required',
            'place'      => 'required',
            'photo'      => 'required|mimes:jpg,png,jpeg',
            'present'    => 'required'
        ]);

        $detainee->first_name = $request->input('first_name');
        $detainee->last_name  = $request->input('last_name');
        $detainee->IDnumber   = $request->input('IDnumber');
        $detainee->gender     = $request->input('gender');
        $detainee->officer    = $request->input('officer');
        $detainee->crime      = $request->input('crime');
        $detainee->place      = $request->input('place');
        if($request->hasfile('photo')){
            $file      = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename  = time(). '.' . $extention;
            $file->move('uploads/suspect/',$filename);
            $suspect->photo = $filename;
        }else{
            return $request;
            $detainee->photo = '';
        }
        $detainee->save();
        return redirect()->back()->with('status','Suspect Booked Successfully');   
    }

    public function view(){
        $detainees = detainee::all();
        return view('officers.view_suspects')->with('detainees',$detainees);
    }
}
