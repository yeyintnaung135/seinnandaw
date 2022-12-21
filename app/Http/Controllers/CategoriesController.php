<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class CategoriesController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admins');
    }
    public function list(){
     
        return view('backend.categories.list');

    }
    
    public function getAllCategories(Request $request) {
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

      $totalRecords = Categories::select('count(*) as allcount')
                      ->where(function ($query) use ($searchValue) {
                        $query->where('id', 'like', '%' . $searchValue . '%')
                            ->orWhere('name', 'like', '%' . $searchValue . '%');
                      })
                      ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])->count();
      $totalRecordswithFilter = $totalRecords;

      $records = Categories::orderBy($columnName, $columnSortOrder)
          ->orderBy('created_at', 'desc')
          ->where(function ($query) use ($searchValue) {
              $query->where('id', 'like', '%' . $searchValue . '%')
                  ->orWhere('name', 'like', '%' . $searchValue . '%');
          })
          ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
          ->select('categories.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();

      $data_arr = array();

      foreach ($records as $record) {
          $data_arr[] = array(
              "id" => $record->id,
              "name" => $record->name,
              "def" => $record->def,
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

    public function save(Request $request){
        $input=$request->except('_token');
        $validator=Validator::make($input,
                                   ['name'=>['required','max:1000','unique:categories']], 
                                   ['name.unique' => 'The category has already been taken.']
                                  );
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Categories::create($input);
        Session::flash('message', 'Your category was successfully created');

        return redirect(url('backend/categories/list'));

    }

    public function detail($id){
        $cat=Categories::find($id);

        return view('backend.categories.detail',['data'=>$cat]);
    }

    /** Delete Section */

    public function delete(Request $request){
        Categories::where('id',$request->id)->delete();
        $uncategorize = Categories::where('name','UNCATEGORIZED')->count();
        if($uncategorize == 0){
            $cat = new Categories();
            $cat->name = 'UNCATEGORIZED';
            $cat->save();
        }
      
        Session::flash('message', 'Your category was successfully Deleted');

        return redirect(url('backend/categories/list'));
    }

    public function trash(){
        return view('backend.categories.trash');
    }

    public function getAllTrashCategories(Request $request) {
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
  
        $totalRecords = Categories::select('count(*) as allcount')
                        ->where(function ($query) use ($searchValue) {
                          $query->where('id', 'like', '%' . $searchValue . '%')
                              ->orWhere('name', 'like', '%' . $searchValue . '%');
                        })
                        ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])->count();
        $totalRecordswithFilter = $totalRecords;
  
        $records = Categories::orderBy($columnName, $columnSortOrder)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) use ($searchValue) {
                $query->where('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('name', 'like', '%' . $searchValue . '%');
            })
            ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->onlyTrashed()
            ->select('categories.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();
  
        $data_arr = array();
  
        foreach ($records as $record) {
            $data_arr[] = array(
                "checkbox" => $record->id,
                "name" => $record->name,
                "created_at" => date('F d, Y ( h:i A )', strtotime($record->created_at)),
                "action" => $record->id,
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

    public function multiple_trashed(Request $request){
        $array = explode(',',$request->id);
        foreach($array as $arr){
            Categories::where('id',$arr)->delete();
        }
        Session::flash('message', 'Your Product was successfully Deleted');
        return redirect(url('backend/categories/list'));
    }

    public function restore($id){
        Categories::onlyTrashed()->find($id)->restore();
        Session::flash('message', 'Your Category was restore');
        return redirect(url('backend/categories/list'));
    }


    public function multiple_restore(Request $request){
        $array = explode(',',$request->id);
        foreach($array as $arr){
            Categories::onlyTrashed()->find($arr)->restore();
        }
        Session::flash('message', 'Your Categories was restore');
        return redirect(url('backend/categories/list'));
    }

    public function multiple_forcedelete(Request $request){
        $array = explode(',',$request->id);
        foreach($array as $arr){
            Categories::onlyTrashed()->find($arr)->forcedelete();
        }
       
        Session::flash('message', 'Your Categories was successfully Deleted');
        return redirect(url('backend/products/list'));
    }
  
}
