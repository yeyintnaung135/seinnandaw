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
                  <div class="col-12 col-md-8 edit-address-container">
                    <p>The following addresses will be used on the checkout page by default.</p>
                    <div class="d-flex flex-wrap justify-content-between">
                      <table class="table table-bordered mb-0 mt-4">
                        <tbody>
                          <tr>
                            <td class="px-3 bg-white d-flex justify-content-between align-items-center border-0" colspan="2">
                              <h4 class="text-uppercase my-2 text-left" style="color: #000;">BILLING ADDRESS</h4>
                              <a href="{{ url('/account/edit-address/billing') }}">Edit</a>
                            </td>
                          </tr>
                          <tr>
                            <td class="px-3">
                              <ul class="list-unstyled d-flex flex-column">
                                <li class="my-1">Swe Nyein</li>
                                <li class="my-1">Street address</li>
                                <li class="my-1">Town / City</li>
                                <li class="my-1">State / County</li>
                                <li class="my-1">Postcode / ZIP</li>
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-bordered mb-0 mt-4">
                        <tbody>
                          <tr>
                            <td class="px-3 bg-white d-flex justify-content-between align-items-center border-0" colspan="2">
                              <h4 class="text-uppercase my-2 text-left" style="color: #000;">SHIPPING ADDRESS</h4>
                              <a href="{{ url('/account/edit-address/shipping') }}">Edit</a>
                            </td>
                          </tr>
                          <tr>
                            <td class="px-3">
                              <ul class="list-unstyled d-flex flex-column">
                                <li class="my-1">Swe Nyein</li>
                                <li class="my-1">Street address</li>
                                <li class="my-1">Town / City</li>
                                <li class="my-1">State / County</li>
                                <li class="my-1">Postcode / ZIP</li>
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection