<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\suspect;

class SuspectController extends Controller
{
    public function index(){
        return view('officers.book_suspect');
    }

    public function insert(Request $request){
        $suspect = new suspect;
        $request -> validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'IDnumber'=>'required',
            'gender'=>'required',
            'officer'=>'required',
            'crime'=>'required',
            'place'=>'required',
            'photo'=>'required|mimes:jpg,png,jpeg'
        ]);

        $suspect->first_name = $request->input('first_name');
        $suspect->last_name = $request->input('last_name');
        $suspect->IDnumber = $request->input('IDnumber');
        $suspect->gender = $request->input('gender');
        $suspect->officer = $request->input('officer');
        $suspect->crime = $request->input('crime');
        $suspect->place = $request->input('place');
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extention;
            $file->move('uploads/suspect/',$filename);
            $suspect->photo = $filename;
        }else{
            return $request;
            $suspect->photo = '';
        }
        $suspect->save();
        return redirect()->back()->with('status','Record Added Successfully');   
    }

    public function view(){
        $suspects = suspect::all();
        return view('officers.view_suspects')->with('suspects',$suspects);
    }
}
