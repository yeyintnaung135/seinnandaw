<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\checkout;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontprivateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
//    public function storeproducttocart(){
//
//        return 'haha';
//    }
    public function paywithmpu($data)
    {
        return $data['payment'];

    }

    public function startgotobank(Request $request)
    {
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
        if ($request->payment == '1') {
            $this->paywithmpu($request->all());
        }else{
            return $request->all();

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
