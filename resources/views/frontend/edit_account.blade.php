@extends('layouts.frontend.frontend')

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
                          <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First name <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last name <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword4"
                                          placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Display name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="">
                                <em>This will be how your name will be displayed in the account section and in reviews</em>
                            </div>
                            <div class="form-group">
                              <label for="inputAddress">Email Address <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="">
                            </div>
                            <p class="border-bottom mt-4 pb-1">Password change</p>
                            <div class="form-group">
                              <label for="inputAddress">Current password (leave blank to leave unchanged)</label>
                              <input type="password" class="form-control" id="">
                            </div>
                            <div class="form-group">
                              <label for="inputAddress">New password (leave blank to leave unchanged)</label>
                              <input type="password" class="form-control" id="">
                            </div>
                            <div class="form-group">
                              <label for="inputAddress">Confirm new password</label>
                              <input type="password" class="form-control" id="">
                            </div>
                            <button class="edit-account-save font-weight-bold mt-3">SAVE CHANGES</button>
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