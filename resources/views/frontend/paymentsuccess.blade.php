@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
                <div class="card text-center payment-success-container">
                    <div class="mt-4"><img src="{{url('images/logo.png')}}" alt="SeinNanDaw" class="card-img-top"
                                           style="width: 160px;"></div>
                    @if($payment_success !== 'empty')


                    @if($payment_success->status == 'success' )
                            <div class="card-body p-1">
                                <h3 class=""><i class="fa fa-check-circle text-success"></i> Payment Successful!</h3>
                                <p class="text-secondary">We well received your payment.</p>
                            </div>
                        <ul class="list-group border-0" style="color: #505050;">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 my-2 mx-5">
                                <h5 class="mb-0 text-left">Product ID</h5>
                                <span class="text-right">{{ $payment_success->product_id }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 my-2 mx-5">
                                <h5 class="mb-0 text-left">Product Name</h5>
                                <span class="text-right">{{ $payment_success->product->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 my-2 mx-5">
                                <h5 class="mb-0 text-left">Quantity</h5>
                                <span class="text-right">{{ $payment_success->counts }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 my-2 mx-5">
                                <h5 class="mb-0 text-left">Date & Time</h5>
                                <span class="text-right">{{ $payment_success->created_at }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 my-2 mx-5">
                                <h5 class="mb-0 text-left">Payment Method</h5>
                                <span class="text-right">{{ $payment_success->bank_name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-top-0 border-right-0 border-left-0 border-bottom p-0 pb-4 my-2 mx-5">
                                <h5 class="mb-0 text-left">Transaction ID</h5>
                                <span class="text-right">{{ $payment_success->tran_id }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 pt-2 my-2 mx-5"
                                style="color: #000;">
                                <h4>Paid Amount</h4>
                                <h4 class="">{{ $payment_success->amount }} MMK</h4>
                            </li>
                        </ul>
                        <div class="mt-4 mb-3 pt-2 text-secondary">
                            <h6 style="font-size: 16px;">Thank you so much for your purchasement.</h6>
                        </div>
                        @else
                            <div class="card-body p-1">
                                <h3 class=""><i class="fa fa-times-circle text-danger"></i> Payment Fail!</h3>
                                <p class="text-secondary">Something Wrong Please try again later</p>
                            </div>
                    @endif
                    @endif

                </div>
        </div>
    </section>
@endsection
