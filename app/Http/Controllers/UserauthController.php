<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserauthController extends Controller
{
    //
    public function login(Request $request){
        $input=$request->except('_token');
       if(Auth::attempt(['email'=>$input['usernameoremail'],'password'=>$input['password']])){
           return 'yes';
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
