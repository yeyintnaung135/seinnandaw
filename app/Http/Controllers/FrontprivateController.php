<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\checkout;
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
    public function getatccounts()
    {
        $getcounts = DB::table('addtocart')->where('userid', Auth::user()->id)->selectRaw("SUM(count) as sum")->pluck('sum');
        return response()->json(['counts' => intval($getcounts[0])]);

    }

    public function storeproducttocart(Request $request)
    {
        if (count(Addtocart::where('userid', Auth::user()->id)->where('product_id', $request->id)->get()) == 0) {
            Addtocart::create(['userid' => Auth::user()->id, 'product_id' => $request->id, 'count' => 1]);
            $combineoldandnewcount = 1;
        } else {
            $getoldata = Addtocart::where('userid', Auth::user()->id)->where('product_id', $request->id);
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
        $getoldata = Addtocart::where('userid', Auth::user()->id)->where('product_id', $request->id);
        if (empty($getoldata->get())) {
            return response()->json(['message' => 'fail']);

        }
        $getoldata->update(['count' => $request->count]);
        $getcounts = DB::table('addtocart')->where('userid', Auth::user()->id)->selectRaw("SUM(count) as sum")->pluck('sum');

        return response()->json(['message' => intval($getcounts[0])]);

    }

    public function removecartitem(Request $request)
    {


        $getoldata = Addtocart::where('userid', Auth::user()->id)->where('product_id', $request->id);
        $getoldata->delete();
        $checkoutishas=checkout::where('userid',Auth::user()->id)->where('productid',$request->id);
        if(!empty($checkoutishas->first())){
            $deletealso=$checkoutishas->delete();
        }

        return response()->json(['message' => 'success']);

    }
}
