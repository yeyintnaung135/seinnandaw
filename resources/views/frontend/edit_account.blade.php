@extends('layouts.frontend.frontend')
@section('title','My account - Sein Nan Daw')
@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4 row">
              <div class="container-fluid p-0 mx-3">
                <h2 class="text-uppercase mb-3 text-left">MY ACCOUNT</h2>
                <div class="row pf-container">
                  <div class="col-12 col-md-4">
                    @include('layouts.frontend.profile_menu')
                  </div>
                  <div class="col-12 col-md-8">
                    <div class="row edit-account-container">
                      <div class="col-12">
                        @if (Session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>{{ Session('success') }}</strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          
                        @endif
                          <form action="{{route('user.update',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastName"
                                          placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="displayName">Display name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name')
                                  is-invalid
                                @enderror" name="name" id="displayName" value="{{ old('name',$user->name) }}">
                                <em>This will be how your name will be displayed in the account section and in reviews</em>
                                @error('name')
                                    <span class="font-weight-bold text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span> 
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email Address <span class="text-danger">*</span></label>
                              <input type="email" class="form-control @error('email')
                                 is-invalid
                              @enderror" name="email" id="email" value="{{ old('email',$user->email) }}">
                              @error('email')
                                    <span class="font-weight-bold text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <p class="border-bottom mt-4 pb-1">Password Change</p>
                            <div class="form-group">
                              <label for="inputCurrentPassword">Current password (leave blank to leave unchanged)</label>
                              <input type="password" name="current_password" class="form-control @error('current_password')
                                is-invalid
                              @enderror" id="inputCurrentpassword">
                              @error('current_password')
                                  <span class="font-weight-bold text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputNewPassword">New password (leave blank to leave unchanged)</label>
                              <input type="password" class="form-control @error('new_password')
                                is-invalid
                              @enderror" name="new_password" id="inputNewPassword">
                              @error('new_password')
                                  <span class="font-weight-bold text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputConfirmPassword">Confirm new password</label>
                              <input type="password" class="form-control @error('new_confirm_password')
                                is-invalid
                              @enderror" name="new_confirm_password" id="inputConfirmPassword">
                              @error('new_confirm_password')
                                  <span class="font-weight-bold text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              @enderror
                            </div>
                            <button class="edit-account-save font-weight-bold mt-3" type="submit">SAVE CHANGES</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection