@extends('layouts.frontend.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
          <h2 class="text-uppercase mb-3 text-left">My Account</h2>
          <p>Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p>

          <div class="">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              <form method="POST" action="{{ route('password.email') }}" class="sn-login-form pt-4 pb-5">
                  @csrf
                  <div class="">
                      <label for="email" class="mb-1">{{ __('E-Mail Address') }}</label>

                      <div class="">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="">
                      <div class="">
                          <button type="submit" class="mt-3 mb-3 sn-login-button">
                              {{ __('Send Password Reset Link') }}
                          </button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>
@endsection
