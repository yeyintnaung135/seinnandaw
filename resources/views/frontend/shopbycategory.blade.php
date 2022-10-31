@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="sn-products p-3 p-md-5 bg-white">
        <h4>JEWELRY FOR EVERY OCCASION</h4>
        <h2 class="text-uppercase mb-5">{{ $category }}</h2>
        <div class="sn-home-products row">
          <a href="{{url('/product/1')}}" class="col-6 col-md-4 col-lg-3 mb-4">
            <img src="{{ url('images/products/14.jpg') }}" alt="">
            <span class="sn-category">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="col-6 col-md-4 col-lg-3 mb-4">
            <img src="{{ url('images/products/15.jpg') }}" alt="">
            <span class="sn-category">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="col-6 col-md-4 col-lg-3 mb-4">
            <img src="{{ url('images/products/16.jpg') }}" alt="">
            <span class="sn-category">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
          <a href="{{url('/product/1')}}" class="col-6 col-md-4 col-lg-3 mb-4">
            <img src="{{ url('images/products/17.jpg') }}" alt="">
            <span class="sn-category">Necklace</span>
            <h3 class="sn-product-title">White Gold Women's Necklace</h3>
            <span class="sn-price">502,000 Ks</span>
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

@endpush