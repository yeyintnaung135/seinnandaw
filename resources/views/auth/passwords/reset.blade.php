@extends('layouts.frontend.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
          <h2 class="text-uppercase mb-3 text-left">My Account</h2>

          <div class="">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              <form method="POST" id='login' action="{{ route('password.update') }}" class="sn-login-form pt-4 pb-5">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="">
                    <label for="email" class="mb-1">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="position-relative">
                    <label for="password" class="mb-1">{{ __('Password') }}</label>


                    <div class="" id="reg">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror topas" name="password" required autocomplete="new-password">
                        <i  class="fas fa-eye-slash eye toggleeye"></i>


                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


              <div class="position-relative">
                <label for="password-confirm" class="mb-1">{{ __('Confirm Password') }}</label>

                <div class="" id="con">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <i  class="fas fa-eye-slash eye toggleeye"></i>
                </div>

                <div class="">
                    <div class="">
                        <button type="submit" class="mt-3 mb-3 sn-login-button">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
