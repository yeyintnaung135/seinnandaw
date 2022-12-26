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
                        <form class="col-12" method="POST" action="{{url('account/edit-address/shipping')}}">
                          @csrf
                            <h2 class="font-weight-normal mb-2 pb-3" style="color: #000;">SHIPPING ADDRESS</h2>
                            <input type="hidden" name="user_id" value="{{Auth::guard('web')->user()->id}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First name <span class="text-danger">*</span></label>
                                    <input name="first_name" type="text" class="form-control" id="first_name" 
                                          placeholder="First Name" value="{{old('first_name',isset($shipping_address->first_name) ? $shipping_address->first_name : '')}}" required>
                                    @error('first_name')
                                      <span style="color:red;font-size:13px;font-weight:bold;">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name <span class="text-danger">*</span></label>
                                    <input name="last_name" type="text" class="form-control" id="last_name"
                                          placeholder="Last Name" value="{{old('last_name',isset($shipping_address->last_name) ? $shipping_address->last_name : '')}}" required>
                                    @error('last_name')
                                      <span style="color:red;font-size:13px;font-weight:bold;">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company name (optional)</label>
                                <input name="company_name" type="text" class="form-control" id="company_name"
                                          value="{{old('company_name',isset($shipping_address->company_name) ? $shipping_address->company_name : '')}}">
                                @error('company_name')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country">Country / Region <span class="text-danger">*</span></label>
                                <select name="country" id="country" class="form-control js-example-disabled-results">
                                  <?php
                                    $allcountry = DB::table('helper_country')->get()
                                  ?>
                                  @foreach($allcountry as $cou)
                                      @if(!isset($shipping_address->country) && $cou->code == 'MM')
                                          <option value="{{$cou->code}}" selected>{{$cou->name}}</option>
                                      @elseif (isset($shipping_address->country))
                                          <option value="{{$cou->code}}" {{ $cou->code == $shipping_address->country ? 'selected' : '' }}>{{$cou->name}}</option>
                                      @else
                                          <option value="{{$cou->code}}">{{$cou->name}}</option>
                                      @endif
                                  @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="street">Street address <span class="text-danger">*</span></label>
                                <input name="street" type="text" class="form-control" id="street"
                                      placeholder="House number and street name" value="{{old('street',isset($shipping_address->street) ? $shipping_address->street : '')}}" required>
                                @error('street')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                                <input name="apartment" type="text" class="form-control mt-2" id="apartment"
                                      placeholder="Apartment, suite, unit, etc. (optional)" value="{{old('apartment',isset($shipping_address->apartment) ? $shipping_address->apartment : '')}}">
                            </div>
                            <div class="form-group">
                                <label for="city">Town / City <span class="text-danger">*</span></label>
                                <input name="city" type="text" class="form-control" id="city" value="{{old('city',isset($shipping_address->city) ? $shipping_address->city : '')}}" required>
                                @error('city')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="state">State / County <span class="text-danger">*</span></label>
                                <input name="state" type="text" class="form-control" id="state" value="{{old('state',isset($shipping_address->state) ? $shipping_address->state : '')}}" required>
                                @error('state')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postcode">Postcode / ZIP (optional)</label>
                                <input name="postcode" type="text" class="form-control" id="postcode" value="{{old('postcode',isset($shipping_address->postcode) ? $shipping_address->postcode : '')}}">
                                @error('postcode')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input name="phone" type="text" class="form-control" id="phone" value="{{old('phone',isset($shipping_address->phone) ? $shipping_address->phone : '')}}" required>
                                @error('phone')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address <span class="text-danger">*</span></label>
                                <input name="email" type="text" class="form-control" id="email" value="{{old('email',isset($shipping_address->email) ? $shipping_address->email : '')}}" required>
                                @error('email')
                                  <span style="color:red;font-size:13px;font-weight:bold;">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <button type="submit" class="edit-account-save font-weight-bold">SAVE ADDRESS</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
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
