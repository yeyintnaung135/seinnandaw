<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admins');
    }
    public function delete(Request $request){
        Products::where('id',$request->id)->delete();
        Session::flash('message', 'Your Product was successfully Deleted');

        return redirect(url('backend/products/list'));
    }
    public function list(){
        $products=Products::orderBy('id','desc')->get();

        return view('backend.products.list',['data'=>$products]);

    }
    public function getAllProducts(Request $request) {
      $draw = $request->get('draw');
      $start = $request->get("start");
      $rowperpage = $request->get("length"); // total number of rows per page

      $columnIndex_arr = $request->get('order');
      $columnName_arr = $request->get('columns');
      $order_arr = $request->get('order');
      $search_arr = $request->get('search');

      $columnIndex = $columnIndex_arr[0]['column']; // Column index
      $columnName = $columnName_arr[$columnIndex]['data']; // Column name
      $columnSortOrder = $order_arr[0]['dir']; // asc or desc
      $searchValue = $search_arr['value']; // Search value

      $searchByFromdate = $request->get('searchByFromdate');
      $searchByTodate = $request->get('searchByTodate');

      if($searchByFromdate == null) {
        $searchByFromdate = '0-0-0 00:00:00';
      }
      if($searchByTodate == null) {
        $searchByTodate = Carbon::now();
      }

      $totalRecords = Products::select('count(*) as allcount')
                      ->where(function ($query) use ($searchValue) {
                        $query->where('id', 'like', '%' . $searchValue . '%')
                            ->orWhere('name', 'like', '%' . $searchValue . '%')
                            ->orWhere('price', 'like', '%' . $searchValue . '%')
                            ->orWhere('photo', 'like', '%' . $searchValue . '%');
                      })
                      ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])->count();
      $totalRecordswithFilter = $totalRecords;

      $records = Products::orderBy($columnName, $columnSortOrder)
          ->orderBy('created_at', 'desc')
          ->where(function ($query) use ($searchValue) {
              $query->where('id', 'like', '%' . $searchValue . '%')
                  ->orWhere('name', 'like', '%' . $searchValue . '%')
                  ->orWhere('price', 'like', '%' . $searchValue . '%')
                  ->orWhere('photo', 'like', '%' . $searchValue . '%');
          })
          ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
          ->select('products.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();

      $data_arr = array();

      foreach ($records as $record) {
          $data_arr[] = array(
              "id" => $record->id,
              "name" => $record->name,
              "photo" => $record->photo,
              "price" => $record->price,
              "created_at" => date('F d, Y ( h:i A )', strtotime($record->created_at)),
              "id" => $record->id,
          );
      }

      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordswithFilter,
          "aaData" => $data_arr,
      );
      echo json_encode($response);
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

        $validator=Validator::make($input,['name'=>['required','max:1000'],
            'photo_one'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_two'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_three'=>['mimes:jpeg,bmp,png,jpg'],
            'photo_four'=>['mimes:jpeg,bmp,png,jpg'],'price'=>['required','max:1000000000000000']]);
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
        if ($request->file('photo_one')){
            if (File::exists(public_path($product->photo_one))) {
                File::delete(public_path($product->photo_one));
            }
            $photo_one = $input['photo_one'];

            $photo_oneimageNameone = time().'photo_one'.'.'.$photo_one->getClientOriginalExtension();

            $photo_one->move(public_path('images/products/'),$photo_oneimageNameone);
            $input['photo_one']='images/products/'.$photo_oneimageNameone;
        }else{
            $input['photo_one']=$product->photo_one;
        }
        if ($request->file('photo_two')){
            if (File::exists(public_path($product->photo_two))) {
                File::delete(public_path($product->photo_two));
            }
            $photo_two = $input['photo_two'];

            $photo_twoimageNameone = time().'photo_two'.'.'.$photo_two->getClientOriginalExtension();

            $photo_two->move(public_path('images/products/'),$photo_twoimageNameone);
            $input['photo_two']='images/products/'.$photo_twoimageNameone;
        }else{
            $input['photo_two']=$product->photo_two;
        }
        if ($request->file('photo_three')){
            if (File::exists(public_path($product->photo_three))) {
                File::delete(public_path($product->photo_three));
            }
            $photo_three = $input['photo_three'];

            $photo_threeimageNameone = time().'photo_three'.'.'.$photo_three->getClientOriginalExtension();

            $photo_three->move(public_path('images/products/'),$photo_threeimageNameone);
            $input['photo_three']='images/products/'.$photo_threeimageNameone;
        }else{
            $input['photo_three']=$product->photo_three;
        }
        if ($request->file('photo_four')){
            if (File::exists(public_path($product->photo_four))) {
                File::delete(public_path($product->photo_four));
            }
            $photo_four = $input['photo_four'];

            $photo_fourimageNameone = time().'photo_four'.'.'.$photo_four->getClientOriginalExtension();

            $photo_four->move(public_path('images/products/'),$photo_fourimageNameone);
            $input['photo_four']='images/products/'.$photo_fourimageNameone;
        }else{
            $input['photo_four']=$product->photo_four;
        }

        Products::where('id',$input['id'])->update(['name'=>$input['name'],'price'=>$input['price'],'description'=>$input['description'],
            'photo'=>$input['photo'],'subcategory'=>$input['subcategory'],
            'photo_one'=>$input['photo_one'],
            'photo_two'=>$input['photo_two'],
            'photo_three'=>$input['photo_three'],
            'photo_four'=>$input['photo_four']
            ,'feature'=>$input['feature'],'category_id'=>$input['category_id']]);
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
