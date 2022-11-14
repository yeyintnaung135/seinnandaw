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

        $validator=Validator::make($input,['name'=>['required','max:1000'],'price'=>['required','max:1000000000000000'],'photo'=>['required','mimes:jpeg,bmp,png,jpg'],
            'photo_one'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_two'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_three'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_four'=>['mimes:jpeg,bmp,png,jpg'],
        ]);
        if($validator->fails()){
//            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('photo_one')){
            $photo_one = $input['photo_one'];
            $photonameone = time().'photo_one'.'.'.$photo_one->getClientOriginalExtension();
            $photo_one->move(public_path('images/products/'),$photonameone);
            $input['photo_one']='images/products/'.$photonameone;
        }else{
            $input['photo_one']='';
        }
        if ($request->file('photo_two')){
            $photo_two = $input['photo_two'];
            $photonametwo = time().'photo_two'.'.'.$photo_two->getClientOriginalExtension();
            $photo_two->move(public_path('images/products/'),$photonametwo);
            $input['photo_two']='images/products/'.$photonametwo;
        }else{
            $input['photo_two']='';
        }
        if ($request->file('photo_three')){
            $photo_three = $input['photo_three'];
            $photonamethree = time().'photo_three'.'.'.$photo_three->getClientOriginalExtension();
            $photo_three->move(public_path('images/products/'),$photonamethree);
            $input['photo_three']='images/products/'.$photonamethree;
        }else{
            $input['photo_three']='';
        }
        if ($request->file('photo_four')){
            $photo_four = $input['photo_four'];
            $photonamefour = time().'photo_four'.'.'.$photo_four->getClientOriginalExtension();
            $photo_four->move(public_path('images/products/'),$photonamefour);
            $input['photo_four']='images/products/'.$photonamefour;
        }else{
            $input['photo_four']='';
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
