<?php

namespace App\Http\Controllers\Ocs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ocs;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting data from model
        //$ocs = Ocs::latest()->paginate(5);

           //return view when page is loaded
         //return view('ocs.index',compact("ocs")) 
      
       return view('Ocs\ocs_landing_page');
       //->with('i',(request()->input('page',1)-1)*5);
      // return View::make('officers\officer_landing_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ocs\create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'o_number'=>'required',
          'first_name'=>'required',
          'last_name'=>'required',
          'email'=>'required',
          'password'=>'required',
          'role_id'=>'required',
          
        ]);

        Ocs::create($request->all());
        return redirect()-route('ocs_landing_page.index')
        ->with('success','Officers added sucessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ocs $ocs)
    {
        return view('ocs.show',compact('ocs_landing_page'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocs $ocs)
    {
        return view('ocs.edit',compact('ocs_landing_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ocs $ocs)
    {
        $request->validate([
            
        ]);
        $ocs->update($request->all());
        return redirect()->route('ocs_landing_page.index')
        ->with('success','Officer updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocs $ocs)
    {
        $ocs->delete();

        //return redirect()->('ocs_landing_page.index')->with('success','Officer deleted sucessfully');
    }

    public function view(){
        $officers = user::all();
        return view('ocs.view_officer')->with('officers',$officers);
    }
}
