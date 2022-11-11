<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admins');
    }
    public function delete(Request $request){
        Products::where('id',$request->id)->delete();
        Session::flash('message', 'Your category was successfully Deleted');

        return redirect(url('backend/products/list'));
    }
    public function list(){
        $products=Products::orderBy('id','desc')->get();

        return view('backend.products.list',['data'=>$products]);

    }
    public function add(){
        $catlist=Categories::orderBy('id','asc')->get();
        return view('backend.products.add',['catlist'=>$catlist]);

    }
    public function edit($id){
        $data=Products::where('id',$id)->first();
        $catlist=Categories::orderBy('id','asc')->get();

        return view('backend.products.edit',['catlist'=>$catlist,'data'=>$data]);

    }
    public function update(Request $request){
        $input=$request->except('_token');
        $product=Products::where('id',$input['id'])->first();

        $validator=Validator::make($input,['name'=>['required','max:1000'],'price'=>['required','max:1000000000000000']]);
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

        Products::where('id',$input['id'])->update(['name'=>$input['name'],'price'=>$input['price'],'description'=>$input['description'],'photo'=>$input['photo'],'feature'=>$input['feature'],'category_id'=>$input['category_id']]);
        Session::flash('message', 'Your product was successfully edited');

        return redirect(url('backend/products/list'));

    }
    public function save(Request $request){
        $input=$request->except('_token');

        $validator=Validator::make($input,['name'=>['required','max:1000'],'price'=>['required','max:1000000000000000'],'photo'=>['required','mimes:jpeg,bmp,png,jpg']]);
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
