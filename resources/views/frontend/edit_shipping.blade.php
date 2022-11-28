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
                        <form class="col-12">
                            <h2 class="font-weight-normal mb-2 pb-3" style="color: #000;">SHIPPING ADDRESS</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First name <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last name <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword4"
                                          placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Company name (optional)</label>
                                <input type="text" class="form-control" id="inputAddress">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Country / Region <span class="text-danger">*</span></label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Street address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputAddress2"
                                      placeholder="House number and street name">
                                <input type="text" class="form-control mt-2" id="inputAddress2"
                                      placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Town / City <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="inputPassword4">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">State / County <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="inputPassword4">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Postcode / ZIP (optional)</label>
                                <input type="password" class="form-control" id="inputPassword4">
                            </div>
                            <button class="edit-account-save font-weight-bold">SAVE ADDRESS</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection