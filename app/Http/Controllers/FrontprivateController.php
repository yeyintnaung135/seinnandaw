<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\checkout;
use App\Products;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FrontprivateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:web']);
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



    public function paywithmpu($data, $bankname)
    {
        $bankamount = $this->changebankamountformat($data['totalprice']);
        if ($bankname == 'kbz') {
            $merchantid = env('KBZ_MERCHANTID');
            $src = env('KBZ_SEC');
        }

        $tosendarray = ['merchantID' => $merchantid,
            'invoiceNo' => rand(1000, 9999999) . 'car_' . $data['pid'],
            'productDesc' => 'Please check carefully you are about to buy',
            'amount' => $bankamount,
            'currencyCode' => '104',
            // 'FrontendURL' => 'http://localhost/seinnandaw/public/checkoutmpukbzsuccess',
            'FrontendURL' => 'http://localhost/checkoutmpukbzsuccess',
            'userDefined1' => 'userid_' . Auth::guard('web')->user()->name,
            'userDefined2' => 'productid_' . $data['pid'],
        ];
        $sigstr = $this->create_signature_string($tosendarray);
        $hash_value = hash_hmac('sha1', $sigstr, $src, false);
        return view('frontend.checkoutstart', ['hash' => $hash_value, 'sigstr' => $sigstr, 'data' => $tosendarray]);


    }

    public function paywithmastervisa($data)
    {
        $uuid=uniqid();
        $now=Carbon::now()->format("Y-m-d\TH:i:s\Z");
        $tosendarray = [
            'access_key' =>  env('MASTER_ACCESS_KEY'),
            'profile_id' =>  env('MASTER_PROFILE_ID'),
            'reference_number'=> $data['pid'],
            'transaction_uuid' =>$uuid,
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


        if ($request->payment == '1') {
            return $this->paywithmpu($data, 'kbz');
        }
        if ($request->payment == '3') {
            return $this->paywithmastervisa($data);
        }


    }

    public function getatccounts()
    {
        $getcounts = DB::table('addtocart')->where('userid', Auth::guard('web')->user()->id)->selectRaw("SUM(count) as sum")->pluck('sum');
        return response()->json(['counts' => intval($getcounts[0])]);

    }

    public function storeproducttocart(Request $request)
    {
        if (count(Addtocart::where('userid', Auth::guard('web')->user()->id)->where('product_id', $request->id)->get()) == 0) {
            Addtocart::create(['userid' => Auth::guard('web')->user()->id, 'product_id' => $request->id, 'count' => 1]);
            $combineoldandnewcount = 1;
        } else {
            $getoldata = Addtocart::where('userid', Auth::guard('web')->user()->id)->where('product_id', $request->id);
            $combineoldandnewcount = $getoldata->first()->count + 1;
            $getoldata->update(['count' => $combineoldandnewcount]);
        }
        return response()->json(['counts' => $combineoldandnewcount]);

    }

    public function changecount(Request $request)
    {
        if ($request->count < 1) {
            return response()->json(['message' => 'fail']);

        }
        $getoldata = Addtocart::where('userid', Auth::guard('web')->user()->id)->where('product_id', $request->id);
        if (empty($getoldata->get())) {
            return response()->json(['message' => 'fail']);

        }
        $getoldata->update(['count' => $request->count]);
        $getcounts = DB::table('addtocart')->where('userid', Auth::guard('web')->user()->id)->selectRaw("SUM(count) as sum")->pluck('sum');

        return response()->json(['message' => intval($getcounts[0])]);

    }

    public function removecartitem(Request $request)
    {


        $getoldata = Addtocart::where('userid', Auth::guard('web')->user()->id)->where('product_id', $request->id);
        $getoldata->delete();
        $checkoutishas = checkout::where('userid', Auth::guard('web')->user()->id)->where('productid', $request->id);
        if (!empty($checkoutishas->first())) {
            $deletealso = $checkoutishas->delete();
        }

        return response()->json(['message' => 'success']);

    }
}
