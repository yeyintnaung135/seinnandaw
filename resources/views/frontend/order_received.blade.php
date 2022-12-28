@extends('layouts.frontend.frontend')

@section('content')
  <section>
    @if ($payment == 'success')
      <div class="container-fluid row px-3 py-4 px-md-4 py-md-5 m-0 or-container">
        <div class="col-12 p-1 p-md-4">
          {{-- {{ print_r($user_info) }} --}}
          <div class="pb-3 or-thank">
            <h2 class="text-uppercase mb-4 text-left">CHECKOUT</h2>
            <p class="mb-4">Thank you. Your order has been received.</p>
            <a href="{{ url('/') }}" class="btn btn-primary sn-place-order-button d-block" style="width: 200px;">Go To Home Page</a>
            <ul class="list-unstyled d-flex flex-wrap order-confirm-list" style="display: none !important;">
              <li class="d-flex flex-column pr-4 mr-4 don">
                <label>ORDER NUMBER:</label>
                <strong>1598</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>DATE:</label>
                <strong>November 25, 2022</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>EMAIL:</label>
                <strong>sweswe123@gmail.com</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>TOTAL:</label>
                <strong>507,800Ks</strong>
              </li>
              <li class="d-flex flex-column">
                <label>PAYMENT METHOD:</label>
                <strong>Direct bank transfer</strong>
              </li>
            </ul>
          </div>
        </div>
      </div>
    @else
      <div class="container-fluid row px-3 py-4 px-md-4 py-md-5 m-0 or-container">
        <div class="col-12 p-1 p-md-4">
          {{-- {{ print_r($user_info) }} --}}
          <div class="pb-3 or-thank">
            <h2 class="text-uppercase mb-4 text-left">CHECKOUT</h2>
            @if ($payment == 'required_screenshot')
              <p class="mb-4 text-danger text-bold"><span class="text-danger">**</span></td> Please upload payment screenshot to confirm your order.</p>
            @else
              <p class="mb-4">Please upload payment screenshot to confirm your order.</p>
            @endif
            <ul class="list-unstyled d-flex flex-wrap order-confirm-list" style="display: none !important;">
              <li class="d-flex flex-column pr-4 mr-4 don">
                <label>ORDER NUMBER:</label>
                <strong>1598</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>DATE:</label>
                <strong>November 25, 2022</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>EMAIL:</label>
                <strong>sweswe123@gmail.com</strong>
              </li>
              <li class="d-flex flex-column pr-4 mr-4">
                <label>TOTAL:</label>
                <strong>507,800Ks</strong>
              </li>
              <li class="d-flex flex-column">
                <label>PAYMENT METHOD:</label>
                <strong>Direct bank transfer</strong>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12 px-1 px-md-4 py-0">
          <div class="or-bank">
            <h2 class="text-uppercase mb-4 text-left">OUR BANK DETAILS</h2>
            <ul class="list-unstyled d-flex flex-column order-bank-list">
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>AYA Bank Special account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>1000-4110-705</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>KBZ Bank Special account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>3181-3705-7001-2270-1</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>Yoma Bank Special account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0021-4544-4000-043</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>CB Bank Special account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0044-1009-0000-0175</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>AYA Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>4000-2164-898</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>KBZ Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0041-0105-7001-2270-1</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>Yoma Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0021-1011-5000-338</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>CB banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0010-6005-0021-3802</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>UAB Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0020-1010-0027-812</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>MAB Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>0030-1210-0301-5213-018</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>AGD Banking account</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>ACCOUNT NUMBER:</label>
                    <strong>3040-1110-0016-9013</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">SEIN NAN DAW ONLINE SHOP:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column">
                    <label>BANK:</label>
                    <strong>Wave Pay</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">SEIN NAN DAW (DIAMONDS AND FINE JEWELRY):</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column">
                    <label>BANK:</label>
                    <strong>KBZ Pay</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>One Pay</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>PHONE NUMBER:</label>
                    <strong>09-5127611</strong>
                  </div>
                </div>
              </li>
              <li class="mb-4">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>AYA Pay</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>PHONE NUMBER:</label>
                    <strong>09-421065697</strong>
                  </div>
                </div>
              </li>
              <li class="">
                <h3 class="mb-4">DAW YIN YIN HMWE:</h3>
                <div class="d-flex flex-wrap">
                  <div class="d-flex flex-column pr-4 mr-4">
                    <label>BANK:</label>
                    <strong>A+ wallet</strong>
                  </div>
                  <div class="d-flex flex-column">
                    <label>PHONE NUMBER:</label>
                    <strong>09-5127611</strong>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12 p-1 px-md-4 py-md-3">
          <div class="">
            <table class="table table-bordered mb-0">
              <tbody>
                <tr>
                  <td class="px-3 bg-white" colspan="2"><h4 class="text-uppercase my-2 text-left">ORDER DETAILS</h4></td>
                </tr>
                <tr>
                  <th class="px-3">Product</th>
                  <th>Total</th>
                </tr>
                <tr>
                  <td class="px-3">{{ $user_info->pname }}</td>
                  <td>{{ $user_info->pprice }} Ks</td>
                </tr>
                <tr>
                  <td>Subtotal:</td>
                  <td>{{ $user_info->pprice }} Ks</td>
                </tr>
                <tr>
                  <td>Shipping:</td>
                  <td>Local pickup</td>
                </tr>
                <tr>
                  <td>Payment method:</td>
                  <td>Direct bank transfer</td>
                </tr>
                <tr>
                  <td>Total:</td>
                  <td>{{ $user_info->pprice }} Ks</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12 p-1 px-md-4 py-md-3">
          <div class="">
            <table class="table table-bordered mb-0">
              <tbody>
                <tr>
                  <td class="px-3 bg-white" colspan="2"><h4 class="text-uppercase my-2 text-left">BILLING ADDRESS</h4></td>
                </tr>
                <tr>
                  <td class="px-3">
                    <ul class="list-unstyled d-flex flex-column">
                      <li class="my-1">{{ $user_info->firstname . ' ' . $user_info->lastname }}</li>
                      <li class="my-1">{{ $user_info->address_one }}</li>
                      <li class="my-1">{{ $user_info->city }}</li>
                      <li class="my-1">{{ isset($user_info->state) ? $user_info->state : 'State / County' }}</li>
                      <li class="my-1">{{ isset($user_info->postcode) ? $user_info->postcode : 'Postcode / ZIP' }}</li>
                      <li class="my-1"><i class="fa fa-phone mr-2"></i>{{ $user_info->phone }}</li>
                      <li class="my-1"><i class="fa fa-envelope mr-2"></i>{{ $user_info->email }}</li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12 p-1 px-md-4 py-md-3">
          <div class="pb-3">
            <form action="{{url('directbank')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="firstname" value="{{ $user_info->firstname }}">
              <input type="hidden" name="lastname" value="{{ $user_info->lastname }}">
              <input type="hidden" name="company_name" value="{{ $user_info->company_name }}">
              <input type="hidden" name="country" value="{{ $user_info->country }}">
              <input type="hidden" name="address_one" value="{{ $user_info->address_one }}">
              <input type="hidden" name="apartment" value="{{ $user_info->apartment }}">
              <input type="hidden" name="city" value="{{ $user_info->city }}">
              <input type="hidden" name="state" value="{{ $user_info->state }}">
              <input type="hidden" name="postcode" value="{{ $user_info->postcode }}">
              <input type="hidden" name="phone" value="{{ $user_info->phone }}">
              <input type="hidden" name="email" value="{{ $user_info->email }}">
              <input type="hidden" name="pname" value="{{ $user_info->pname }}">
              <input type="hidden" name="pid" value="{{ $user_info->pid }}">
              <input type="hidden" name="checkoutid" value="{{ $user_info->checkoutid }}">
              <input type="hidden" name="pcount" value="{{ $user_info->pcount }}">
              <input type="hidden" name="pprice" value="{{ $user_info->pprice }}">
              <input type="hidden" name="payment" value="{{ $user_info->payment }}">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="px-3 bg-white" colspan="2">ငွေလွှဲထားသော Screenshotအားပေးပို့ရန် <span class="text-danger">*</span></td>
                  </tr>
                  <tr>
                    <td class="px-3">
                      {{-- <label class="or-file-upload mb-0">
                        <input type="file" name="payment_screenshot" class="d-none">
                          Choose File
                      </label> --}}
                      <label class="mb-0">
                        <input type="file" name="payment_screenshot" class="" accept=".jpg,.jpeg,.png">
                      </label>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button type="submit" class="btn btn-primary sn-place-order-button w-25 mt-2">PLACE ORDER
              </button>
            </form>
          </div>
        </div>
      </div>
    @endif
    
  </section>
@endsection

@push('scripts')

@endpush
