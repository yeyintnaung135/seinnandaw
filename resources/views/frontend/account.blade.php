@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4">
              <h2 class="text-uppercase mb-3 text-left">MY ACCOUNT</h2>
              <div class="row">
                <div class="mt-2 col-6">
                  <h4 class="h4 font-weight-bold mb-4 pb-3">LOGIN</h4>
                  <form class="border p-4 mr-2 rounded" action="{{url('user/login')}}" method="post">
                      <div class="">
                          @error('login')
                          <span style="color:red;">  {{$message}}</span>
                          @enderror
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group">
                              <label for="inputAddress">Email</label>
                              <input type="text" name='usernameoremail' value="{{old('usernameoremail')}}" class="form-control" id="inputAddress">
                          </div>

                          <div class="form-group">
                              <label for="inputAddress">Password</label>
                              <input type="password" name="password"  class="form-control" id="inputAddress">
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary sn-place-order-button w-25">LOGIN</button>
                          </div>
                          @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  {{ __('Forgot Your Password?') }}
                              </a>
                          @endif
                      </div>
                  </form>
                </div>
                <div class="mt-2 col-6">
                  <h4 class="h4 font-weight-bold mb-4 pb-3">Register</h4>
                  <form class="border p-4 ml-2 rounded" action="{{url('user/register')}}" method="post">
                      <div class="">

                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <div class="form-group">
                              <label for="inputAddress">Name</label>
                              <input type="text" name='name' value="{{old('name')}}" class="form-control" id="inputAddress">
                              @error('name')
                              <span style="color:red;">  {{$message}}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="inputAddress">Email</label>
                              <input type="text" name='email' value="{{old('email')}}" class="form-control" id="inputAddress">
                              @error('email')
                              <span style="color:red;">  {{$message}}</span>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="inputAddress">Password</label>
                              <input type="password" name="password"  class="form-control" id="inputAddress">
                              @error('password')
                              <span style="color:red;">  {{$message}}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="inputAddress">Confirm Passwrod</label>
                              <input type="password" name="password_confirmation"  class="form-control" id="inputAddress">
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary sn-place-order-button w-25">Register</button>
                          </div>

                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush
