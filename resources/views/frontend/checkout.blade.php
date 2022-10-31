@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="p-1 p-md-4">
        <h2 class="text-uppercase mb-3 text-left">CHECKOUT</h2>
          <form class="row mt-5">
            <div class="col-12 col-md-7 pr-md-5">
              <h4 class="h4 font-weight-bold border-bottom mb-4 pb-3">BILLING DETAILS</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">First name <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Last name <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
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
                <input type="text" class="form-control" id="inputAddress2" placeholder="House number and street name">
                <input type="text" class="form-control mt-2" id="inputAddress2" placeholder="Apartment, suite, unit, etc. (optional)">
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
                <label for="inputPassword4">Postcode / ZIP <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="inputPassword4">
              </div>
              <div class="form-group">
                <label for="inputPassword4">Phone <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="inputPassword4">
              </div>
              <div class="form-group">
                <label for="inputPassword4">Email address <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="inputPassword4">
              </div>
              <div class="form-group mt-4 border-bottom pb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label h4 font-weight-bold" for="gridCheck">
                    SHIP TO A DIFFERENT ADDRESS?
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Order notes (optional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <div class="border p-2 pt-3 p-md-4">
                <h4 class="h4 font-weight-bold mb-3">YOUR ORDER</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-top-0">Product</th>
                      <th scope="col" class="border-top-0"></th>
                      <th scope="col" class="border-top-0">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Sein Nan Daw Diamond Women`s Ring</th>
                      <td>× 1</td>
                      <td>1,000,000Ks</td>
                    </tr>
                    <tr>
                      <th scope="row">Sein Nan Daw Diamond Women`s Ring</th>
                      <td>× 1</td>
                      <td>1,000,000Ks</td>
                    </tr>
                    <tr>
                      <th scope="row">Subtotal</th>
                      <td></td>
                      <td>2,000,000Ks</td>
                    </tr>
                    <tr>
                      <th scope="row">Shipping</th>
                      <td></td>
                      <td>Local pickup</td>
                    </tr>
                    <tr>
                      <th scope="row">Total</th>
                      <td></td>
                      <td>2,000,000Ks</td>
                    </tr>
                  </tbody>
                </table>
                <div class="m-2">
                  <div>
                    <h5>Direct bank transfer</h5>
                    <p class="p-3" style="background: #eee;">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                  </div>
                  <p class="my-4">Your personal data will be used to process your order, 
                    support your experience throughout this website, 
                    and for other purposes described in our <a href="#">privacy policy</a>.</p>
                  <button type="submit" class="btn btn-primary sn-place-order-button">PLACE ORDER</button>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

@endpush