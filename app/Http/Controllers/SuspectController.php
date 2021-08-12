<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\suspect;
use Carbon\Carbon;

class SuspectController extends Controller
{
    public function index(){
        return view('officers.book_suspect');
    }

    public function insert(Request $request){
        $suspect = new suspect;
        $request -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'IDnumber'   => 'required',
            'gender'     => 'required',
            'officer'    => 'required',
            'crime'      => 'required',
            'place'      => 'required',
            'photo'      => 'required|mimes:jpg,png,jpeg',
        ]);

        /*if(Carbon::now()->isWeekend()) {
            echo 'Party!';
        }else{
            echo 'No!';
        }*/

        $holiday_dates = [
            ['day' => 1, 'month' => 1],//new year
            ['day' => 1, 'month' => 5],//labour day
            ['day' => 1, 'month' => 6],//madaraka day
            ['day' => 10, 'month' => 10],//moi day
            ['day' => 20, 'month' => 10],//mashujaa day
            ['day' => 12, 'month' => 12],//jamuhuri day
            ['day' => 25, 'month' => 12],//christmas day
            ['day' => 5, 'month' => 8],//text
            ['day' => 26, 'month' => 12]//boxing day
        ];

        $holidays = [];
        foreach ($holiday_dates as $holidayDate) {
            $date = Carbon::now()->setTimezone('Africa/Nairobi');
            $date->setDate($date->format('Y'), $holidayDate['month'], $holidayDate['day']);
            $holidays[] = $date->format('Y-m-d');
        }
        /*if (in_array(Carbon::now()->setTimezone('Africa/Nairobi')->format('Y-m-d'), $holidays)) {
            echo "Yeah it's a holiday";
            echo Carbon::now()->addHour(48);
        }else{
            echo "Nah not a holiday";
            Carbon::now()->addHour(24);
        }*/

        /*$date = Carbon::now()->setTimezone('Africa/Nairobi'); 
        if($date->dayOfWeek == Carbon::FRIDAY){
            echo 'Thursday';
            echo $date;
            $today = Carbon::now()->addHour(72);
            echo $today;
        }elseif($date->dayOfWeek == Carbon::SATURDAY){
            echo 'Saturday';
            $today = Carbon::now()->addHour(48);
            echo $today;
        }
        elseif($date->dayOfWeek == Carbon::SUNDAY){
            echo 'Sunday';
            $today = Carbon::now()->addHour(72);
            echo $today;
        }*/ 
        $date = Carbon::now()->setTimezone('Africa/Nairobi');      
       
        $suspect->first_name = $request->input('first_name');
        $suspect->last_name  = $request->input('last_name');
        $suspect->IDnumber   = $request->input('IDnumber');
        $suspect->gender     = $request->input('gender');
        $suspect->officer    = $request->input('officer');
        $suspect->crime      = $request->input('crime');
        $suspect->place      = $request->input('place'); 
        if($date->dayOfWeek == Carbon::FRIDAY){
            $today = Carbon::now()->addHour(72);
            $suspect->present = $today;
        }elseif($date->dayOfWeek == Carbon::SATURDAY){
            $today = Carbon::now()->addHour(48);
            $suspect->present = $today;
        }
        elseif($date->dayOfWeek == Carbon::SUNDAY){
            $today = Carbon::now()->addHour(24);
            $suspect->present = $today;
        }
        elseif (in_array(Carbon::now()->setTimezone('Africa/Nairobi')->format('Y-m-d'), $holidays)) {
            $today = Carbon::now()->addHour(48);
            $suspect->present = $today;
        }
        else{
            $suspect->present = Carbon::now()->addHour(24);
        }  
        //$suspect->present = Carbon::now()->addHour(24);
        if($request->hasfile('photo')){
            $file      = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename  = time(). '.' . $extention;
            $file->move('uploads/suspect/',$filename);
            $suspect->photo = $filename;
        }else{
            return $request;
            $suspect->photo = '';
        }
        $suspect->status = 'not presented';
        $suspect->save();
        //here to change the book back part
        return redirect()->back()->with('status','Record Added Successfully');
    }

    public function view(){
        $suspects = suspect::all();
        return view('officers\view_suspects')->with('suspects',$suspects);
    }
}
