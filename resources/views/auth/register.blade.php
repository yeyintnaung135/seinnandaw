@extends('layouts.app')

@section('content')
<div class="d-block d-md-flex bg-white sn-login-container " style="height: calc(100vh);">

    <div class="mx-3 mx-lg-5 pt-2 px-1 px-md-2 px-lg-5">

      <a class="d-block py-3" href="{{url('/')}}"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw" style="width: 200px;margin: 0 auto;display: block;"></a>

        <div class="mx-0 mx-md-2 mx-lg-3">
          <form method="POST" action="{{ url($url)}}" id="adminRegister" class="sn-login-form px-4 pt-4 pb-5 bg-white">
            @csrf

            <div class="">
                <label for="name" class="mb-1">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="rounded-0 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="email" class="mb-1">{{ __('E-Mail Address') }}</label>

                <div class="position-relative">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="" id="reg">
                <label for="password" class="mb-1">{{ __('Password') }}</label>

                <div class="position-relative">
                    <input id="password" type="password" class="form-control topas @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <i  class="fas fa-eye-slash eye toggleeye"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="" id="con">
                <label for="password-confirm" class="mb-1">{{ __('Confirm Password') }}</label>

                <div class="position-relative">
                    <input id="password-confirm" type="password" class="form-control topas" name="password_confirmation" required autocomplete="new-password">
                    <i  class="fas fa-eye-slash eye toggleeye"></i>
                </div>
            </div>

            <div class="float-right">
                <div class="">
                    <button type="submit" class="mb-3 sn-login-button">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
          </form>
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