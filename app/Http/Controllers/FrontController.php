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
        return view('frontend.index');
    }

    public function shop()
    {
      return view('frontend.shop');
    }

    public function showbycategory($category) {
      return view('frontend.shopbycategory', ['category' => $category]);
    }

    public function product_detail($id) {
        $data=Products::findOrFail($id);
        $cat=Categories::where('id',$data->category_id)->first();
      return view('frontend.product_detail', ['data' => $data,'cat'=>$cat]);
    }

    public function cart() {
      return view('frontend.cart');
    }

    public function checkout() {
      return view('frontend.checkout');
    }
}
