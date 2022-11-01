<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    //
    public function construct(){
        $this->middleware('auth');
    }
    public function list(){
        $products=Products::all();

        return view('backend.products.list',['data'=>$products]);

    }
    public function add(){
        $catlist=Categories::orderBy('id','asc')->get();
        return view('backend.products.add',['catlist'=>$catlist]);

    }
    public function save(Request $request){
        $input=$request->except('_token');

        $validator=Validator::make($input,['name'=>['required','max:1000'],'price'=>['required','max:1000000000000000'],'photo'=>['required','mimes:jpeg,bmp,png,jpg'],'description'=>['required']]);
        if($validator->fails()){
//            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $img = $input['photo'];

        $imageNameone = time().'img'.'.'.$img->getClientOriginalExtension();

        $lpath=$img->move(public_path('images/products/'),$imageNameone);
        $input['photo']='images/products/'.$imageNameone;
        Products::create($input);
        Session::flash('message', 'Your product was successfully created');

        return redirect(url('backend/products/list'));

    }
}
