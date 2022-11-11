@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="sn-products p-3 p-md-5 bg-white">
        <h4>JEWELRY FOR EVERY OCCASION</h4>
        <h2 class="text-uppercase mb-5">{{ $category }}</h2>
        <div class="sn-home-products d-flex flex-wrap mt-5">
            @foreach($data as $d)
          <a href="{{url('/product/detail/'.$d->id)}}" class="mb-4">
            <img src="{{ url($d->photo) }}" alt="">
            <span class="sn-category my-2">{{strtoupper($category)}}</span>
            <h3 class="sn-product-title">{{$d->name}}</h3>
            <span class="sn-price">{{$d->price}} Ks</span>
          </a>
                @endforeach

        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

@endpush
