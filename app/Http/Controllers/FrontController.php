<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;

class FrontController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data=Products::where('feature','yes')->get();
        return view('frontend.index',['data'=>$data]);
    }

    public function shop()
    {
      return view('frontend.shop');
    }

    public function showbycategory($category,$id) {
        $data=Products::where('category_id',$id)->orderBy('id','desc')->get();
      return view('frontend.shopbycategory', ['category' => $category,'data'=>$data]);
    }

    public function product_detail($id) {
        $data=Products::findOrFail($id);
        $min=$data->price - (($data->price * 20)/100);
        $max=$data->price + (($data->price * 20)/100);

        $sim=Products::where('price','>=',$min)->where('price','<=',$max)->where('id','!=',$data->id)->where('category_id',$data->category_id)->orderBy('price','asc')->limit(10)->get();
        $data=Products::findOrFail($id);
        $cat=Categories::where('id',$data->category_id)->first();
      return view('frontend.product_detail', ['data' => $data,'cat'=>$cat,'sim'=>$sim]);
    }

    public function cart() {
      return view('frontend.cart');
    }
    public function account() {
        return view('frontend.account');
    }
    public function checkout() {
      return view('frontend.checkout');
    }
}
