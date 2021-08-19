<?php

namespace App\Http\Controllers\Ocs;

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
        return View::make('Ocs\ocs_landing_page');
    }

    public function new() {
        return View::make('Ocs\ocs');
    }
    //Show from for editing the resource
    /*public function edit(User $user)
    {
        return view('officer.edit',compact('officer'));
    }*/
    //update specific resource from storage
   /* public function update(Request $request, User $officers)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender'=>'required',
            'o_number' => 'required',
            'last_name' => 'required',
           // 'role_id' => ['required','int'],
        ]);

        $officer->update($request->all());

        return redirect()->route('ocs.index')
            ->with('success','Officer updated successfully');
    }*/

    public function create()
    {
        return view('Ocs\create');     
    }

    public function book()
    {
        return view('Ocs\view_suspects_ocs');     
    }

    public function view(){
        $officers = user::all();
        return view('ocs.view_officer')->with('officers',$officers);
    }


    public function search(){
        return view('search');
    }
     
     /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit($id)
    {
          $data=User::findOrFail($id);
          return view('ocs.edit',array('data'=>$data));
    }
//delete function
    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        //User::destroy($id);
        $data->delete();
       // return redirect(route('ocs\view_officers'));
        //->with('success','Officer deleted successfully');
        //$officers->delete($id);

        return redirect()->route('view_officer');
           
    }
    //delete function
    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function delete($id)
    {
        $data = User::find($id);
        //$data-> delete();
        return view('ocs.delete',array('data'=>$data));
    }
/**
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function showData($id)
    {
       $data= User::find($id); 
       return view ('edit',array('data'=>$data));
    }
/**
 * @param\Illuminate\Http\Request $req
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $req, $id)
    {
      $data =User::find($id);
      $data->first_name=$req->first_name;
      $data->last_name=$req->last_name;
      $data->o_number=$req->o_number;
      $data->email=$req->email;
      $data->save();
      return redirect()->route('view_officer');
     

    }

    public function create_o(Request $request){
        $user = new user;
        /*$request -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'IDnumber'   => 'required',
            'gender'     => 'required',
            'officer'    => 'required',
            'crime'      => 'required',
            'place'      => 'required',
            'photo'      => 'required|mimes:jpg,png,jpeg',
        ]);*/
       
        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');
        $user->o_number   = $request->input('o_number');
        $user->email     = $request->input('email');
        $user->gender    = $request->input('gender');
        $user->password      = $request->input('password');
        $user->role_id      = $request->input('role_id');
        $user->save();
        return redirect()->back()->with('status','Record Added Successfully');
    }
}
