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
                    <div class="d-flex justify-content-between align-items-baseline download-container">
                      <p><i class="fa fa-info-circle mr-3" style="color: #269fb7;"></i>No downloads available yet.</p>
                      <a href="{{url('/shop')}}" class="go-to-shop-button">BROWSE PRODUCTS</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection