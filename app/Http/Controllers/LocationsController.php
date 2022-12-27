<?php

namespace App\Http\Controllers;

use App\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class LocationsController extends Controller
{
  //
  public function __construct(){
      $this->middleware('auth:admins');
  }

  public function list() {
    $loc = Locations::orderBy('id')->get();
    return view('backend.locations.list',['loc'=> $loc]);
  }
  
  public function add() {
    return view('backend.locations.add');
  }

  public function save(Request $request) {
    $input=$request->except('_token');
    $validator=Validator::make($input,[
        'branch_name'=>['required','max:1000','unique:locations'],
        'address'=>['required'],
        'phone_number'=>['required']
    ]);
    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }

    Locations::create($input);
    Session::flash('message', 'Your new branch was successfully created');

    return redirect(url('backend/locations/list'));
  }
  
  public function detail($id) {
    $loc = Locations::find($id);
    return view('backend.locations.detail',['loc' => $loc]);
  }

  public function edit($id){
    $loc=Locations::find($id);
    return view('backend.locations.edit',['loc' => $loc]);
  }

  public function update(Request $request) {
    $input=$request->except('_token');
    $validator=Validator::make($input,[
        'branch_name'=>['required','max:1000'],
        'address'=>['required'],
        'phone_number'=>['required']
    ]);
    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $loc=Locations::where('id',$input['id'])->update($input);

    Session::flash('message', 'Your branch was successfully updated');

    return redirect(url('backend/locations/list'));
  }

  public function delete(Request $request) {
    Locations::where('id',$request->id)->delete();
    
    Session::flash('message', 'Your branch was successfully deleted');
    return redirect(url('backend/locations/list'));
  }
    
}
