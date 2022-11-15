<?php

namespace App\Http\Controllers;

use App\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannersController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admins');
    }
    public function add(){
        return view('backend.banners.add');

    }
    public function detail($id){
        $cat=Banners::find($id);

        return view('backend.banners.detail',['data'=>$cat]);
    }
    public function edit($id){
        $data=Banners::where('id',$id)->first();

        return view('backend.banners.edit',['data'=>$data]);

    }
    public function update(Request $request){
        $input=$request->except('_token');
        $product=Banners::where('id',$input['id'])->first();
        $validator=Validator::make($input,[
            'photo'=>['mimes:jpeg,bmp,png,jpg'],
           ]);
        if($validator->fails()){
//            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('photo')){
            if (File::exists(public_path($product->photo))) {
                File::delete(public_path($product->photo));
            }
            $img = $input['photo'];

            $imageNameone = time().'img'.'.'.$img->getClientOriginalExtension();

            $lpath=$img->move(public_path('images/products/'),$imageNameone);
            $input['photo']='images/products/'.$imageNameone;
        }else{
            $input['photo']=$product->photo;
        }
        Banners::where('id',$input['id'])->update([
            'photo'=>$input['photo']
           ]);
        Session::flash('message', 'Your Banner was successfully edited');

        return redirect(url('backend/banners/list'));
    }
    public function list(){
        $cat=Banners::all();

        return view('backend.banners.list',['data'=>$cat]);

    }
    public function delete(Request $request){
       $banner= Banners::where('id',$request->id);
        if (File::exists(public_path($banner->first()->photo))) {
            File::delete(public_path($banner->first()->photo));
        }
        $banner->delete();
        Session::flash('message', 'Your Banner was successfully Deleted');

        return redirect(url('backend/banners/list'));
    }
    public function save(Request $request){
        $input=$request->except('_token');
        $validator=Validator::make($input,[
            'photo'=>['required','mimes:jpeg,bmp,png,jpg']
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $img = $input['photo'];

        $imageNameone = time().'img'.'.'.$img->getClientOriginalExtension();

        $lpath=$img->move(public_path('images/banners/'),$imageNameone);
        $input['photo']='images/banners/'.$imageNameone;
        Banners::create($input);
        Session::flash('message', 'Your Banner was successfully created');

        return redirect(url('backend/banners/list'));

    }
}
