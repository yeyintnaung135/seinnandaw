<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserauthController extends Controller
{
    //
    public function getlogin(){
        if(Auth::check() and Auth::user()->role == 'user'){
            return redirect(url('/'));
        }else{
            return redirect(url('/account'));

        }
    }
    public function login(Request $request){

        $input=$request->except('_token');
       if(Auth::attempt(['email'=>$input['usernameoremail'],'password'=>$input['password'],'role'=>'user'])){
           if(!empty($input['addtocart'])){
               foreach (json_decode($input['addtocart'],true) as $atc){
                   if(count(Addtocart::where('userid',Auth::user()->id)->where('product_id',$atc['id'])->get()) == 0){
                       Addtocart::create(['userid'=>Auth::user()->id,'product_id'=>$atc['id'],'count'=>$atc['count']]);

                   }else{
                       $getoldata=Addtocart::where('userid',Auth::user()->id)->where('product_id',$atc['id']);
                       $combineoldandnewcount=$getoldata->first()->count + $atc['count'];
                       $getoldata->update(['count'=>$combineoldandnewcount]);
                   }
               }
           }
           if(!empty($input['url'])){
               return redirect($input['url']);

           }
           return redirect(url('/'));
       }else{

           return redirect()->back()->withInput()->withErrors(['login'=>'wrong credential']);
       }
    }

    public function regvalidate($data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }
    protected function register(Request $request)
    {
        $input=$request->except('_token');
        $regval=$this->regvalidate($input);
        if($regval->fails()){
            return redirect()->back()->withInput()->withErrors($regval);
        }
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role'=>'user'
        ]);
        Auth::attempt(['email'=>$input['email'],'password'=>$input['password'],'role'=>'user']);
        return redirect()->back();

    }
}
