@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4 row">
                @if(Auth::check() and Auth::user()->role='user')
                @include('frontend.profile')
                @else

                    <form class="mt-5 col-6" action="{{url('user/login')}}" method="post">
                        <div class="col-12 ">
                            @error('login')
                            <span style="color:red;">  {{$message}}</span>
                            @enderror
                            <h4 class="h4 font-weight-bold border-bottom mb-4 pb-3">LOGIN</h4>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="url" value="{{url()->previous()}}"/>
                            <input type="hidden" name="addtocart" value=""/>

                        @if(!empty($addational))
                                <input type="hidden" name="addational" value="{{$addational}}"/>
                            @endif
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text" name='usernameoremail' value="{{old('usernameoremail')}}"
                                       class="form-control" id="inputAddress">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Password</label>
                                <input type="password" name="password" class="form-control" id="inputAddress">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary sn-place-order-button">LOGIN</button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    <form class="mt-5 col-6" action="{{url('user/register')}}" method="post">
                        <div class="col-12 ">

                            <h4 class="h4 font-weight-bold border-bottom mb-4 pb-3">Register</h4>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="url" value="{{url()->previous()}}"/>
                            <input type="hidden" name="addtocart" value=""/>

                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" name='name' value="{{old('name')}}" class="form-control"
                                       id="inputAddress">
                                @error('name')
                                <span style="color:red;">  {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text" name='email' value="{{old('email')}}" class="form-control"
                                       id="inputAddress">
                                @error('email')
                                <span style="color:red;">  {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Password</label>
                                <input type="password" name="password" class="form-control" id="inputAddress">
                                @error('password')
                                <span style="color:red;">  {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Confirm Passwrod</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="inputAddress">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary sn-place-order-button">Register</button>
                            </div>

                        </div>
                    </form>
                @endif

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            console.log(JSON.parse(localStorage.getItem('addtocartlist')));

            $('[name="addtocart"]').val(localStorage.getItem('addtocartlist'));
        });


    </script>

@endpush
