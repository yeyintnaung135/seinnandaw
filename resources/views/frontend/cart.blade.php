@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
        <cart :cartdata="{{$cartdata}}" :guestid="'{{session()->get('guest_id')}}'"></cart>
    </div>
  </section>
@endsection

@push('scripts')

@endpush
