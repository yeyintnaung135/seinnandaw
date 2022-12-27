<?php

namespace App\Http\Controllers;

use App\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class BannersController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admins');
    }
    public function getAllBanners(Request $request) {
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

      $totalRecords = Banners::select('count(*) as allcount')
                      ->where(function ($query) use ($searchValue) {
                        $query->where('id', 'like', '%' . $searchValue . '%')
                            ->orWhere('photo', 'like', '%' . $searchValue . '%');
                      })
                      ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])->count();
      $totalRecordswithFilter = $totalRecords;

      $records = Banners::orderBy($columnName, $columnSortOrder)
          ->orderBy('created_at', 'desc')
          ->where(function ($query) use ($searchValue) {
              $query->where('id', 'like', '%' . $searchValue . '%')
                  ->orWhere('photo', 'like', '%' . $searchValue . '%');
          })
          ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
          ->select('banners.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();

      $data_arr = array();

      foreach ($records as $record) {
          $data_arr[] = array(
              "start" => $start,
              "photo" => $record->photo,
              "created_at" => date('F d, Y', strtotime($record->created_at)),
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
