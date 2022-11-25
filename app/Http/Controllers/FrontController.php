<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\Categories;
use App\checkout;
use App\Products;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Products::where('feature', 'yes')->get();
        return view('frontend.index', ['data' => $data]);
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function showbycategory($category, $id,$sub=null)
    {
        if(!empty($sub)){

            $data = Products::where(function($query) use ($id){
                $query->where('category_id', '=', $id)->orWhere('category_id', '=', '2');


            })->where('subcategory',$sub)->orderBy('id', 'desc')->get();

        }else{
            $data = Products::where('category_id', $id)->orderBy('id', 'desc')->get();

        }
        return view('frontend.shopbycategory', ['category' => $category, 'data' => $data]);
    }

    public function product_detail($id)
    {
        $data = Products::findOrFail($id);
        $min = $data->price - (($data->price * 20) / 100);
        $max = $data->price + (($data->price * 20) / 100);

        $sim = Products::where('price', '>=', $min)->where('price', '<=', $max)->where('id', '!=', $data->id)->where('category_id', $data->category_id)->orderBy('price', 'asc')->limit(10)->get();
        $data = Products::findOrFail($id);
        $cat = Categories::where('id', $data->category_id)->first();
        return view('frontend.product_detail', ['data' => $data, 'cat' => $cat, 'sim' => $sim]);
    }

    public function cart()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            $cartdata = Addtocart::leftjoin('products', 'addtocart.product_id', '=', 'products.id')->where('addtocart.userid', Auth::guard('web')->user()->id)->get();
        } else {
            $cartdata = 0;
        }
        return view('frontend.cart', ['cartdata' => $cartdata]);
    }

    public function account()
    {
        return view('frontend.account');
    }

    public function checkoutform(Request $request)
    {
        //return $request->all();

        $getprice = Products::where('id', $request->productid)->first();
        $totalprice = $getprice->price * $request->count;


        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {

            $hascc = checkout::where('userid', Auth::guard('web')->user()->id);
            if (count($hascc->get()) > 0) {
                $hascc->delete();

            }
            $checkoutdata=checkout::create(['userid' => Auth::guard('web')->user()->id, 'counts' => $request->count, 'productid' => $request->productid, 'status' => 'start']);

            return view('frontend.checkout', ['data' => $request->all(), 'price' => $totalprice, 'product' => $getprice,'checkoutid'=>$checkoutdata->id]);
        } else {
        //return 'noo';

            $hascc = checkout::where('userid', $request->guestid);
            if (count($hascc->get()) > 0) {
                $hascc->delete();

            }
            checkout::create(['userid' => $request->guestid, 'counts' => $request->count, 'productid' => $request->productid, 'status' => 'start']);


            return view('frontend.account', ['addational'=>'hey from checkout']);


        }
    }

    public function getcheckout()
    {
      //return 'get';
        if (Auth::guard('web')->user() and Auth::guard('web')->user()->role == 'user') {


            $getcheckoutdata = checkout::where('userid', Auth::guard('web')->user()->id)->first();
            if (!empty($getcheckoutdata)) {

                $getprice = Products::where('id', $getcheckoutdata->productid)->first();

                $totalprice = $getprice->price * $getcheckoutdata->counts;

                return view('frontend.checkout', ['addational'=>'hey from checkout','checkoutid'=>$getcheckoutdata->id,'data' => ['productid' => $getcheckoutdata->productid, 'count' => $getcheckoutdata->counts], 'price' => $totalprice, 'product' => $getprice]);
            }else{

                return view('frontend.checkout', ['data' => 'empty']);

            }
        }else{
            return view('frontend.account',['addational'=>'hey from checkout']);

        }

    }

    public function orderReceived() {
      return view('frontend.order_received');
    }
}
