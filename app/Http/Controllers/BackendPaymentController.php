<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BackendPaymentController extends Controller
{
    //
    public function list()
    {
        // dd("hello");
        $payments = Payment::all();
        return view('backend.payments.list',compact('payments'));
    }
    public function getPayments(Request $request)
    {
        // logger("hellllll");
        // logger($request->all());
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
        logger($columnSortOrder);

        if($searchByFromdate == null) {
          $searchByFromdate = '0-0-0 00:00:00';
        }
        if($searchByTodate == null) {
          $searchByTodate = Carbon::now();
        }

        $totalRecords = Payment::select('count(*) as allcount')
                        ->where(function ($query) use($searchValue) {
                          $query->where('pay_name', 'like', '%' . $searchValue . '%')
                                ->orWhere('phone', 'like', '%' . $searchValue . '%');
                          })
                        ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
                        ->count();
        $totalRecordswithFilter = $totalRecords;
        // $ads = RegisterLog::where('type',['shop'])->orderBy('created_at', 'desc')->get();
        $records = Payment::orderBy($columnName, $columnSortOrder)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) use($searchValue) {
              $query->where('pay_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%');
              })
            ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->select('payment.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();


        $data_arr = array();
        logger($records);
        foreach ($records as $record) {
          $data_arr[] = array(
              "start" => $start,
              "product" => isset($record->product->name) ? $record->product->name : '',
              "amount" => $record->amount,
              "pay_name" => $record->pay_name,
              "bank" => $record->bank_name,
              "email" => $record->email,
              "user" => $record->user->name,
              "country" => $record->country,
              "created_at" => date('F d, Y',strtotime($record->created_at)),
              "id" => $record->id,

              // "created_at" => $record->created_at,
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
    public function detail(Request $request)
    {
        // dd($request->all());
        $payment = Payment::find($request->payment_id);
        return view('backend.payments.detail',compact('payment'));
    }
    public function delete(Request $request){
        Payment::where('id',$request->payment_id)->delete();
        Session::flash('message', 'Your Payment was successfully Deleted');

        return redirect(url('backend/payments/list'));
    }
}

