<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\checkout;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserauthController extends Controller
{
    //
    public function getlogin()
    {
        if (Auth::check() and Auth::user()->role == 'user') {
            return redirect(url('/'));
        } else {
            return redirect(url('/account'));

        }
    }

    public function checkoutlogin($data)
    {
        if (!empty(checkout::where('userid', Auth::user()->id)->first())) {
            $deletedoldrecord = checkout::where('userid', Auth::user()->id)->delete();
        }

        $checkdatahasincheckouttable = checkout::where('userid', session()->get('guest_id'))->where('status', 'start');
        if (!empty($checkdatahasincheckouttable->first())) {
            $checkproductisinstock = Products::where('id', $checkdatahasincheckouttable->first()->productid);
            if (!empty($checkproductisinstock->first())) {

                $checkdatahasincheckouttable->update(['userid' => Auth::user()->id]);

                $getuseridchangedcount = checkout::where('userid', Auth::user()->id)->where('status', 'start');
                $totalprice = $checkproductisinstock->first()->price * $getuseridchangedcount->first()->counts;
                return redirect('/checkoutform');
            //  return view('frontend.checkout', ['data' => ['count'=>$getuseridchangedcount->first()->counts], 'price' => $totalprice, 'product' => $checkproductisinstock->first()]);

            } else {
                return view('frontend.checkout', ['data' => 'Deleted Product']);
            }

        } else {
            return view('frontend.checkout', ['data' => 'empty']);
        }

    }

    public function login(Request $request)
    {
        $input = $request->except('_token');
        if (Auth::attempt(['email' => $input['usernameoremail'], 'password' => $input['password'], 'role' => 'user'])) {

            if (!empty($input['addtocart'])) {
                foreach (json_decode($input['addtocart'], true) as $atc) {
                    if (!empty(Products::where('id', $atc['id'])->first())) {

                        if (count(Addtocart::where('userid', Auth::user()->id)->where('product_id', $atc['id'])->get()) == 0) {
                            Addtocart::create(['userid' => Auth::user()->id, 'product_id' => $atc['id'], 'count' => $atc['count']]);

                        } else {
                            $getoldata = Addtocart::where('userid', Auth::user()->id)->where('product_id', $atc['id']);
                            $combineoldandnewcount = $getoldata->first()->count + $atc['count'];
                            $getoldata->update(['count' => $combineoldandnewcount]);
                        }
                    }
                }
                if (!empty($request->addational) and $request->addational == 'hey from checkout') {
                    return $this->checkoutlogin($request);
                }
            }
            if (!empty($input['url'])) {
                return redirect($input['url']);

            }
            return redirect(url('/'));
        } else {

            return redirect()->back()->withInput()->withErrors(['login' => 'wrong credential']);
        }
    }

    public function regvalidate($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function register(Request $request)
    {

        $input = $request->except('_token');
        $regval = $this->regvalidate($input);
        if ($regval->fails()) {
            return redirect()->back()->withInput()->withErrors($regval);
        }
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 'user'
        ]);
                Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'role' => 'user']);

        if (!empty($input['addtocart'])) {
            foreach (json_decode($input['addtocart'], true) as $atc) {
                if (!empty(Products::where('id', $atc['id'])->first())) {

                    if (count(Addtocart::where('userid', Auth::user()->id)->where('product_id', $atc['id'])->get()) == 0) {
                        Addtocart::create(['userid' => Auth::user()->id, 'product_id' => $atc['id'], 'count' => $atc['count']]);

                    } else {
                        $getoldata = Addtocart::where('userid', Auth::user()->id)->where('product_id', $atc['id']);
                        $combineoldandnewcount = $getoldata->first()->count + $atc['count'];
                        $getoldata->update(['count' => $combineoldandnewcount]);
                    }
                }
            }
            if (!empty($request->addational) and $request->addational == 'hey from checkout') {
                return $this->checkoutlogin($request);
            }
        }

        return redirect(url('/'));

    }

    public function userlogout()
    {
        Auth::guard('web')->logout();
        Session::put('loguserout', 'yes');

        return redirect(url('user/login'));
    }
}
