<?php

namespace App\Http\Controllers;

use App\checkout;
use App\Point;
use App\Products;
use App\Addtocart;
use App\Categories;
use App\Payment;
use Illuminate\Support\Facades\DB;
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
        $new_arrival = Products::where('new_arrival', 'yes')->latest()->first();
        return view('frontend.index', ['data' => $data,'new_arrival' => $new_arrival]);
    }
    public function location(){
        return view('frontend.location');
    }

    public function shop()
    {
        $products = Products::with('category')->paginate(4);
        return view('frontend.shop',['products' => $products]);
    }
    function fetch_data(Request $request)
    {
        // logger("fetch Data");
        // logger($request->all());
        if($request->ajax())
        {
            $sort_type = $request->get('sorttype');
            if($sort_type == 2)
            {
                $products = Products::latest()->paginate(4);
            }
            elseif($sort_type == 3)
            {
                logger("low");
                $products = Products::orderBy('price','asc')->paginate(4);
            }
            elseif($sort_type == 4)
            {
                $products = Products::orderBy('price','desc')->paginate(4);
            }
            else
            {
                $products = DB::table('products')
                    ->paginate(4);
            }

            //   $products = DB::table('products')
            //                 ->orderBy('price','asc')
            //                 ->paginate(4);
            logger($products);
            return view('frontend.shop_product', compact('products'))->render();
        }
    }

    public function showbycategory($category, $id,$sub=null)
    {
        if(!empty($sub)){

            $data = Products::where(function($query) use ($id){
                $query->where('category_id', '=', $id)->orWhere('category_id', '=', '2');


            })->where('subcategory',$sub)->orderBy('id', 'desc')->with('category')->paginate(4);

        }else{
            $data = Products::where('category_id', $id)->orderBy('id', 'desc')->with('category')->paginate(4);

        }
        logger($data);
        return view('frontend.shopbycategory', ['category' => $category, 'data' => $data,'cate_id' => $id]);
    }

    function category_fetch_data(Request $request)
    {
        logger("cate fetch Data");
        // logger($request->all());
        if($request->ajax())
        {
            $sort_type = $request->get('sorttype');
            if($sort_type == 2)
            {
                $data = Products::where('category_id',$request->cate_id)->latest()->paginate(4);
            }
            elseif($sort_type == 3)
            {
                logger("low");
                $data = Products::where('category_id',$request->cate_id)->orderBy('price','asc')->paginate(4);
            }
            elseif($sort_type == 4)
            {
                $data = Products::where('category_id',$request->cate_id)->orderBy('price','desc')->paginate(4);
            }
            else
            {
                $data = DB::table('products')
                    ->where('category_id',4)
                    ->paginate(4);
            }
            logger($data);
            return view('frontend.category_product', compact('data'))->render();
        }
    }
    public function product_detail($id)
    {
        $data = Products::findOrFail($id);
        $min = $data->price - (($data->price * 20) / 100);
        $max = $data->price + (($data->price * 20) / 100);

        $sim = Products::where('price', '>=', $min)->where('price', '<=', $max)->where('id', '!=', $data->id)->where('category_id', $data->category_id)->orderBy('price', 'asc')->limit(10)->get();
        $data = Products::findOrFail($id);
        $cat = Categories::where('id', $data->category_id)->first();
        $un_cat =  Categories::where('def', 1)->first();
        return view('frontend.product_detail', ['data' => $data, 'cat' => $cat, 'sim' => $sim,'un_cat' => $un_cat]);
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

    public function orders()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            $orders = Payment::where('userid', Auth::guard('web')->user()->id)->get();
            return view('frontend.orders', ['orders' => $orders]);
        } else {
            return redirect('/account');
        }
    }

    public function view_order($id)
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            $order = Payment::where('id', $id)->first();
            return view('frontend.view_order', ['order' => $order]);
        } else {
            return redirect('/account');
        }
    }

    public function downloads()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            return view('frontend.downloads');
        } else {
            return redirect('/account');
        }
    }

    public function edit_address()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            return view('frontend.edit_address');
        } else {
            return redirect('/account');
        }
    }

    public function edit_billing()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            return view('frontend.edit_billing');
        } else {
            return redirect('/account');
        }
    }

    public function edit_shipping()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            return view('frontend.edit_shipping');
        } else {
            return redirect('/account');
        }
    }

    public function edit_account()
    {
        if (Auth::guard('web')->check() and Auth::guard('web')->user()->role == 'user') {
            return view('frontend.edit_account');
        } else {
            return redirect('/account');
        }
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

    public function orderReceived()
    {
        return view('frontend.order_received');
    }
}
