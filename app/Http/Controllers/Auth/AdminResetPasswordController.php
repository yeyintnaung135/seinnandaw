<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AdminResetPasswordController extends Controller
{
use ResetsPasswords;

/**
* Where to redirect users after resetting their password.
*
* @var string
*/
protected $redirectTo = '/backend/home';

/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware('guest:admin');
}

public function showResetForm(Request $request, $token = null)
{
return view('auth.passwords.adminreset')
->with(['token' => $token, 'email' => $request->email]);
}


//defining which guard to use in our case, it's the admin guard
protected function guard()
{
return Auth::guard('admins');
}

//defining our password broker function
protected function broker()
{
return Password::broker('admins');
}
}
