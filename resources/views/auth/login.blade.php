@extends('layouts.app')

@section('content')
<div class="d-block d-md-flex bg-white sn-login-container " style="height: calc(100vh);">

    <div class="mx-3 mx-lg-5 pt-5 px-1 px-md-2 px-lg-5">

      <a class="d-block py-3" href="{{url('/')}}"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw" style="width: 200px;margin: 0 auto;display: block;"></a>

        <div class="mx-0 mx-md-2 mx-lg-3">
            <form method="POST" action="{{ url('adminLogin') }}" class="sn-login-form px-4 pt-4 pb-5 bg-white" id="adminLogin">
                @csrf

                <div class="">
                    <label for="email" class="mb-1">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="password" class="mb-1">{{ __('Password') }}</label>

                    <div class="position-relative">
                        <input id="password" type="password" class="topas @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <i  class="fas fa-eye-slash eye toggleeye"></i>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                  <div class="">
                      <div class="">
                          <div class="">
                              <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="mb-3 sn-login-button">
                      {{ __('Log In') }}
                  </button>
                </div>
            </form>
            <div class="my-2">
              <div class="">

                  @if (Route::has('password.request'))
                      <a class="btn btn-link text-dark" href="{{ route('admin.password.request') }}">
                          {{ __('Lost Your Password?') }}
                      </a>
                  @endif
              </div>
          </div>
          <a class="text-dark d-block ml-3 my-2" href="{{ url('/') }}"><i class="fa fa-arrow-left"></i> Go to Sein Nan Daw</a>
        </div>
    </div>
    <div class="sn-login-banner d-none d-md-block">
      <img src="{{ url('images/banner/login-banner.png') }}" alt="SeinNanDaw">
    </div>
</div>
@endsection

@push('scripts')
  <script>
    
  </script>
@endpush