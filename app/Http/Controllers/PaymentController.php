<?php

namespace App\Http\Controllers;

use App\Categories;
use App\checkout;
use App\Payment;
use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware(['auth:web'])->except('checkoutmpukbzsuccess','checkoutmvsuccess','checkoutmpukbzsuccessbk');
    }
//    public function storeproducttocart(){
//
//        return 'haha';
//    }
    public function changebankamountformat($data)
    {
        $changetostr = strval($data) . '00';
        $countdigit = 12 - strlen($changetostr);
        $i = 1;
        while ($i <= $countdigit) {
            $changetostr = '0' . $changetostr;
            $i++;

        }
        return $changetostr;
    }

    public function create_signature_string($input_fields_array)
    {
        sort($input_fields_array, SORT_STRING);

        $signature_string = "";
        foreach ($input_fields_array as $value) {
            if ($value != "") {
                $signature_string .= $value;
            }
        }

        return $signature_string;
    }

    public function checkoutmpukbzsuccess(Request $request)
    {
        //this route must be post bcuz of kbz defined
        Auth::guard('web')->loginUsingId($request->userDefined1);
        if ($request->respCode == 00) {
            $success = 'success';
        }else{
            $success = $request->respCode;

        }

        Payment::where('tran_id', $request->invoiceNo)->where('product_id', $request->userDefined2)->where('userid', Auth::guard('web')->user()->id)->update(['status' => $success]);
        $payment_success = Payment::where('tran_id', $request->invoiceNo)
                            ->where('product_id', $request->userDefined2)
                            ->where('userid', Auth::guard('web')->user()->id)
                            ->first();
//        so we need to redirect
        return redirect('checkoutmpukbzsuccess/'.$payment_success->id);
    }

    public function getsuccess($data='empty'){
        if($data != 'empty'){
            $payment_success=Payment::where('id',$data)->where('userid', Auth::guard('web')->user()->id)
                ->first();

        }else{
            $payment_success=$data;
        }
        return view('frontend.paymentsuccess', ['payment_success'=>$payment_success]);

    }
    public function checkoutmvsuccess(Request $request)
    {
        if ($request->auth_response == 00) {
            $success = 'success';
        } else {
            $success = $request->auth_response;

        }

        $getbyuuid=Payment::where('tran_id', $request->req_transaction_uuid)->where('product_id', $request->req_reference_number);
        Auth::guard('web')->loginUsingId($getbyuuid->first()->userid);


        $getbyuuid->update(['status' => $success]);
        $payment_success=Payment::where('tran_id', $request->req_transaction_uuid)->where('product_id', $request->req_reference_number)->where('userid', Auth::guard('web')->user()->id)->first();

        return redirect('checkoutmpukbzsuccess/'.$payment_success->id);

    }

    public function checkoutmpukbzsuccessbk(Request $request)
    {

        Auth::guard('web')->loginUsingId($request->userDefined1);
        if ($request->respCode == 00) {
            $success = 'success';

        }else{
            $success = $request->respCode;

        }

        Payment::where('tran_id', $request->invoiceNo)->where('product_id', $request->userDefined2)->where('userid', Auth::guard('web')->user()->id)
            ->update(['status' => $success]);


        return $success;
    }
    public function paywithmastervisa($data)
    {
        $uuid = rand(1000, 999999) . $data['pid'];
        $now = Carbon::now()->format("Y-m-d\TH:i:s\Z");
        Payment::create(['userid' => Auth::guard('web')->user()->id,
            'invoiceNo' => 0,
            'product_id' => $data['pid'],
            'amount' => $data['totalprice'],
            'counts' => $data['pcount'],
            'pay_name' => $data['firstname'] . ' ' . $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address_one'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'tran_id' => $uuid,
            'status' => 'pending',
            'bank_name' => 'AYA (Master Visa)'

        ]);
        $tosendarray = [
            'access_key' => env('MASTER_ACCESS_KEY'),
            'profile_id' => env('MASTER_PROFILE_ID'),
            'reference_number' => $data['pid'],
            'transaction_uuid' => $uuid,
            'signed_field_names' => 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code',
            'unsigned_field_names' => 'card_type,card_number,card_expiry_date',
            'signed_date_time' => $now,
            'locale' => 'en',
            'transaction_type' => 'sale',
            'amount' => $data['totalprice'],
            'currency' => 'mmk',
            'payment_method' => 'card',
            'bill_to_forename' => $data['firstname'],
            'bill_to_surname' => $data['lastname'],
            'bill_to_email' => $data['email'],
            'bill_to_phone' => $data['phone'],
            'bill_to_address_line1' => $data['address_one'],
            'bill_to_address_city' => $data['city'],
            'bill_to_address_state' => $data['state'],
            'bill_to_address_postal_code' => $data['postcode'],
            'bill_to_address_country' => $data['country']


        ];


        return view('frontend.checkoutvisa', ['data' => $tosendarray]);
    }


    public function paywithmpu($data, $bankname)
    {
        $bankamount = $this->changebankamountformat($data['totalprice']);
        if ($bankname == 'kbz') {
            $merchantid = env('KBZ_MERCHANTID');
            $src = env('KBZ_SEC');
        }
        if ($bankname == 'aya') {
            $merchantid = env('AYA_MERCHANTID');
            $src = env('AYA_SEC');
        }
        $invno=rand(1000, 999999) . $data['pid'];
        Payment::create([
            'userid' => Auth::guard('web')->user()->id,
            'product_id' => $data['pid'],
            'amount' =>$data['totalprice'],
            'counts' => $data['pcount'],
            'pay_name' => $data['firstname'] . ' ' . $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address_one'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'bank_name' => $bankname,
            'invoiceNo' => $invno,
            'tran_id' =>$invno,
            'status' => 'pending',


        ]);
        $tosendarray = ['merchantID' => $merchantid,
            'invoiceNo' => $invno,
            'productDesc' => $data['pcount'] . ' ' . Str::limit($data['pname'], 50, '...'),
            'amount' => $bankamount,
            'currencyCode' => '104',
            'FrontEndUrl' => url('checkoutmpukbzsuccess'),
            'BackEndUrl' => url('checkoutmpukbzsuccessbk'),
            'userDefined1' => Auth::guard('web')->user()->id,
            'userDefined2' => $data['pid'],
            'userDefined3' => $data['pcount'] . ',' . $data['firstname'] . ',' . $data['lastname'] . ',' . $data['phone'] . ',' . $data['email'] . ',' . $data['address_one'] . ',' . $data['country'] . ',' . $data['state'] . ',' . $data['city'],
        ];
        $sigstr = $this->create_signature_string($tosendarray);
        $hash_value = hash_hmac('sha1', $sigstr, $src, false);
        return view('frontend.checkoutstart', ['hash' => $hash_value, 'sigstr' => $sigstr, 'data' => $tosendarray]);


    }




    public function startgotobank(Request $request)
    {
        $data = $request->all();
        $tocheckcheckoutdata = checkout::where('id', $request->checkoutid)->first();

        if (Auth::guard('web')->user()->id != $tocheckcheckoutdata->userid) {
            return abort(401);

        }

        if (empty($tocheckcheckoutdata)) {
            return abort(401);
        } else {
            $tocheckproductdata = Products::where('id', $tocheckcheckoutdata->productid)->first();
            if (empty($tocheckcheckoutdata)) {
                return abort(404);
            } else {
                $totalprice = $request->pcount * $tocheckproductdata->price;
                if ($tocheckcheckoutdata->counts != $request->pcount or $request->pprice != $totalprice) {
                    return abort(401);
                }
            }
        }
        $data['totalprice'] = $totalprice;
        $data['pid'] = $tocheckcheckoutdata->productid;
        $data['pname'] = $tocheckproductdata->name;

        if ($request->payment == '0') {
            return 'driect bank view';
        }
        if ($request->payment == '1') {

            return $this->paywithmpu($data, 'kbz');
        }
        if ($request->payment == '2') {
            return $this->paywithmpu($data, 'aya');
        }
        if ($request->payment == '3') {
            return $this->paywithmastervisa($data);
        }


    }

}
