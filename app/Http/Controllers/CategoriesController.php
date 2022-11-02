<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','isadmin']);
    }
    public function list(){
        $cat=Categories::all();

        return view('backend.categories.list',['data'=>$cat]);

    }
    public function add(){
        return view('backend.categories.add');

    }
    public function edit($id){
        $cat=Categories::find($id);

        return view('backend.categories.edit',['data'=>$cat]);

    }
    public function update(Request $request){
        $input=$request->except('_token');
        $validator=Validator::make($input,['name'=>['required','max:1000']]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cat=Categories::where('id',$input['id'])->update(['name'=>$input['name']]);
        Session::flash('message', 'Your category was successfully Edited');

        return redirect(url('backend/categories/list'));

    }
    public function detail($id){
        $cat=Categories::find($id);

        return view('backend.categories.detail',['data'=>$cat]);
    }
    public function delete(Request $request){
        Categories::where('id',$request->id)->delete();
        Session::flash('message', 'Your category was successfully Deleted');

        return redirect(url('backend/categories/list'));
    }
    public function save(Request $request){
        $input=$request->except('_token');
        $validator=Validator::make($input,['name'=>['required','max:1000']]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Categories::create($input);
        Session::flash('message', 'Your category was successfully created');

        return redirect(url('backend/categories/list'));

    }
}
