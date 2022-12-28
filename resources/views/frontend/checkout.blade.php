@extends('layouts.frontend.frontend')

@section('content')
    <section>
        <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
            <div class="p-1 p-md-4">
                @if($data != 'empty')
                    <h2 class="text-uppercase mb-3 text-left">CHECKOUT</h2>
                    <form action="{{url('connectwithbank')}}" method="post">
                    <div class="row mt-5">


                        <div class="col-12 col-md-7 pr-md-5">
                            <h4 class="h4 font-weight-bold border-bottom mb-4 pb-3">BILLING DETAILS</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" class="form-control" id="inputEmail4" placeholder="First Name" value="{{old('firstname',isset($billing_address->first_name) ? $billing_address->first_name : '')}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" class="form-control" id="inputPassword4"
                                           placeholder="Last name " value="{{old('lastname',isset($billing_address->last_name) ? $billing_address->last_name : '')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Company name (optional)</label>
                                <input type="text" name="company_name" class="form-control" id="inputAddress" value="{{old('company_name',isset($billing_address->company_name) ? $billing_address->company_name : '')}}">
                            </div>
                            <div class="form-group">
                                <label >Country / Region <span class="text-danger">*</span></label>

                                    <select  name="country" class="form-control js-example-disabled-results">
                                        <?php
                                        $allcountry = DB::table('helper_country')->get()
                                        ?>
                                        @foreach($allcountry as $cou)
                                            @if($cou->code == 'MM')
                                                <option value="{{$cou->code}}" selected>{{$cou->name}}</option>
                                            @elseif (isset($billing_address->country))
                                                <option value="{{$cou->code}}" {{ $cou->code == $billing_address->country ? 'selected' : '' }}>{{$cou->name}}</option>
                                            @else
                                                <option value="{{$cou->code}}">{{$cou->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Street address <span class="text-danger">*</span></label>
                                <input type="text" name="address_one" class="form-control" id="inputAddress2"
                                       placeholder="House number and street name" value="{{old('address_one',isset($billing_address->street) ? $billing_address->street : '')}}" required>
                                <input type="text" class="form-control mt-2" id="inputAddress2" name="apartment"
                                        placeholder="Apartment, suite, unit, etc. (optional)" value="{{old('apartment',isset($billing_address->apartment) ? $billing_address->apartment : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Town / City <span class="text-danger">*</span></label>
                                <input type="text" name='city' class="form-control" id="inputPassword4" value="{{old('city',isset($billing_address->city) ? $billing_address->city : '')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">State / County </label>
                                <input type="text" name='state' class="form-control" id="inputPassword4" value="{{old('state',isset($billing_address->state) ? $billing_address->state : '')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Postcode / ZIP </label>
                                <input type="text" name="postcode" class="form-control" id="inputPassword4" value="{{old('postcode',isset($billing_address->postcode) ? $billing_address->postcode : '')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Phone <span class="text-danger">*</span></label>
                                <input type="text" name='phone' class="form-control" id="inputPassword4" value="{{old('phone',isset($billing_address->phone) ? $billing_address->phone : '')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Email address <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="inputPassword4" value="{{old('email',isset($billing_address->email) ? $billing_address->email : '')}}">
                            </div>
{{--                            <div class="form-group mt-4 border-bottom pb-3">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="gridCheck">--}}
{{--                                    <label class="form-check-label h4 font-weight-bold" for="gridCheck">--}}
{{--                                        SHIP TO A DIFFERENT ADDRESS?--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlTextarea1">Order notes (optional)</label>--}}
{{--                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"--}}
{{--                                          placeholder="Notes about your order, e.g. special notes for delivery."></textarea>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="border p-2 pt-3 p-md-4">
                                <h4 class="h4 font-weight-bold mb-3">YOUR ORDER</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-top-0">Product</th>
                                        <th scope="col" class="border-top-0 text-center">Quantity</th>
                                        <th scope="col" class="border-top-0 text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{$product->name}}</th>
                                        <td class="text-center">{{$data['count']}}</td>
                                        <td class="text-center">{{$price}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                                <div class="m-2">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="pname" value="{{$product->name}}">
                                        <input type="hidden" name="pid" value="{{$product->id}}">
                                        <input type="hidden" name="checkoutid" value="{{$checkoutid}}">
                                        <input type="hidden" name="pcount" value="{{$data['count']}}">
                                        <input type="hidden" name="pprice" value="{{$price}}">
                                    <select class="form-select" name="payment" aria-label="Default select example">
                                        <option value="0" selected>Direct Bank</option>
                                        <option value="1">MPU (KBZ)</option>
                                        <option value="2">MPU (AYA)</option>
                                        <option value="3">Master/Visa (AYA)</option>
                                    </select>
                                    <div style="margin-top:26px">
                                        <h5>Direct bank transfer</h5>
                                        <p class="p-3" style="background: #eee;">Make your payment directly into our
                                            bank account. Please use your Order ID as the payment reference. Your order
                                            will not be shipped until the funds have cleared in our account.</p>
                                    </div>
                                    <p class="my-4">Your personal data will be used to process your order,
                                        support your experience throughout this website,
                                        and for other purposes described in our <a href="#">privacy policy</a>.</p>
                                    <button type="submit" class="btn btn-primary sn-place-order-button">PLACE ORDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                @else
                    EMPTY
                @endif
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();
</script>
@endpush
