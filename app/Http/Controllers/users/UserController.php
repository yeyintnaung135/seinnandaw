<?php

namespace App\Http\Controllers\users;

use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:web','web']);
    }


    public function edit()
    {
        $user = User::find(Auth::guard('web')->id());
        return view('frontend.edit_account' ,compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        if($request->current_password || $request->new_password || $request->new_confirm_password){
        
            $request->validate([
                'current_password' => ['required','min:8', new MatchOldPassword],

                'new_password' => ['required','min:8'],
    
                'new_confirm_password' => ['same:new_password'],
            ]);
            $user->password = Hash::make($request->new_password);
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
            ]);
        }
      
        $request->except('_token', '_method');
        $user->name = $request->name;
        $user->email = $request->email;
        $result = $user->update();

        if($result){
            return redirect()->back()->with('success','Update successfully!');
        }
    }
}
