@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="p-1 p-md-4">
        <h2 class="text-uppercase mb-3 text-left">CART</h2>
        <div class="sn-cart-table table-responsive">
          <table class="table border">
            <thead class="bg-white">
              <tr scope="row">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" class="text-center">
                  <span>
                    <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
                      <path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
                    </svg>
                  </span>
                </td>
                <td>
                  <img src="{{ url('images/products/14.jpg') }}" class="sn-cart-image"/>
                </td>
                <td>Sein Nan Daw Diamond Women`s Ring</td>
                <td>1,000,000Ks</td>
                <td>
                  <div class="sn-pd-input d-flex">
                    <input type="number" name="" id="" value="1">
                  </div>
                </td>
                <td>1,000,000Ks</td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <span>
                    <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" width="18" height="18" viewBox="0 0 24 24">
                      <path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
                    </svg>
                  </span>
                </td>
                <td>
                  <img src="{{ url('images/products/15.jpg') }}" class="sn-cart-image"/>
                </td>
                <td>Sein Nan Daw Diamond Women`s Ring</td>
                <td>1,000,000Ks</td>
                <td>
                  <div class="sn-pd-input d-flex">
                    <input type="number" name="" id="" value="1">
                  </div>
                </td>
                <td>1,000,000Ks</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right">
                  <button class="mr-0 mr-md-5 p-2">UPDATE CART</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="sn-cart-total-table table-responsive row ml-0 mt-3">
          <div class="col-12 col-md-6"></div>
          <table class="table border col-12 col-md-6 float-right">
            <thead class="bg-white">
              <tr scope="row">
                <th colspan="2"><h3 class="font-weight-bold m-0">CART TOTALS</h3></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 35%;">Subtotal</td>
                <td>2,000,000Ks</td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td>
                  <p>Local pickup
                    Shipping to U lu Ni Lan, Ahlone, Yangon, Yangon, 11121.
                  </p>
                  <a href="#">Change Address</a>
                </td>
              </tr>
              <tr>
                <td>Total</td>
                <td>2,000,000Ks</td>
              </tr>
              <tr>
                <td colspan="2" class="text-center p-4">
                  <a href="{{url('/checkout')}}" class="sn-to-checkout p-3 w-100 d-block text-decoration-none">PROCEED TO CHECKOUT</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

@endpush