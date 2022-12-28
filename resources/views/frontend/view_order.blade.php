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
                  <div class="col-12 col-md-8 view-order-container">
                    <p>Order #<span style="color: #000;">{{ $order->id }}</span> was placed on <span style="color: #000;">{{ \Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</span> and is <span style="color: #000;">{{ $order->status }}</span>.</p>
                    <h2 class="text-uppercase mb-3 mt-4 text-left" style="color: #000;">ORDER DETAILS</h2>
                    <table class="table mb-0">
                      <tbody class="border">
                        <tr>
                          <th class="px-3 bg-white">Product</th>
                          <th class="px-3 bg-white">Total</th>
                        </tr>
                        <tr>
                          <td class="px-3 border"><a href="{{url('/product/detail/'.$order->product_id)}}">{{ $order->product->name }}</a> x {{ $order->counts }}</td>
                          <td class="border">{{ number_format($order->amount) }} Ks</td>
                        </tr>
                        <tr>
                          <td class="border">Subtotal:</td>
                          <td class="border">{{ number_format($order->amount) }} Ks</td>
                        </tr>
                        <tr>
                          <td class="border">Shipping:</td>
                          <td class="border text-muted">Local pickup</td>
                        </tr>
                        <tr>
                          <td class="border">Payment method:</td>
                          <td class="border">{{ $order->bank_name }}</td>
                        </tr>
                        <tr>
                          <td class="border">Total:</td>
                          <td class="border">{{ number_format($order->amount) }} Ks</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered mb-0 mt-4">
                      <tbody>
                        <tr>
                          <td class="px-3 bg-white" colspan="2"><h2 class="text-uppercase my-2 text-left" style="color: #000;">BILLING ADDRESS</h2></td>
                        </tr>
                        <tr>
                          <td class="px-3">
                            <ul class="list-unstyled d-flex flex-column">
                              <li class="my-1">{{ $order->pay_name }}</li>
                              <li class="my-1">{{ $order->address }}</li>
                              <li class="my-1">{{ $order->city }}</li>
                              <li class="my-1">{{ $order->state }}</li>
                              {{-- <li class="my-1">{{ $order->address }}</li> --}}
                              <li class="my-1"><i class="fa fa-phone mr-2"></i>{{ $order->phone }}</li>
                              <li class="my-1"><i class="fa fa-envelope mr-2"></i>{{ $order->email }}</li>
                            </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered mt-4 d-none">
                      <tbody>
                        <tr>
                          <td class="px-3 bg-white" colspan="2">ငွေလွှဲထားသော Screenshotအားပေးပို့ရန်</td>
                        </tr>
                        <tr>
                          <td class="px-3">
                            <label class="or-file-upload mb-0">
                              <input type="file" accept=".jpg,.jpeg,.png" class="d-none">
                                Choose File
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection