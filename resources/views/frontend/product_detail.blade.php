@extends('layouts.frontend.frontend')

@section('content')
  <section>
    <div class="container-fluid px-3 py-4 px-md-4 py-md-5">
      <div class="p-1 p-md-4">
        <div class="row">
          <div class="col-12 col-md-6">
            <div>
              <div
                class="swiper productDetailSwiper"
              >
                <div class="swiper-wrapper">
                  <div class="swiper-slide" data-src="{{ url('images/products/14.jpg') }}" data-fancybox="product_detail">
                    <img src="{{ url('images/products/14.jpg') }}" />
                  </div>
                  <div class="swiper-slide" data-src="{{ url('images/products/15.jpg') }}" data-fancybox="product_detail">
                    <img src="{{ url('images/products/15.jpg') }}" />
                  </div>
                  <div class="swiper-slide" data-src="{{ url('images/products/16.jpg') }}" data-fancybox="product_detail">
                    <img src="{{ url('images/products/16.jpg') }}" />
                  </div>
                  <div class="swiper-slide" data-src="{{ url('images/products/17.jpg') }}" data-fancybox="product_detail">
                    <img src="{{ url('images/products/17.jpg') }}" />
                  </div>              
                </div>
              </div>
              <div thumbsSlider="" class="swiper productDetailSwiperthumb">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="{{ url('images/products/14.jpg') }}" />
                  </div>
                  <div class="swiper-slide">
                    <img src="{{ url('images/products/15.jpg') }}" />
                  </div>
                  <div class="swiper-slide">
                    <img src="{{ url('images/products/16.jpg') }}" />
                  </div>
                  <div class="swiper-slide">
                    <img src="{{ url('images/products/17.jpg') }}" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div>
              <a href="#" class="sn-pd-cat d-block mb-3">category name</a>
              <h4 class="font-weight-bold">SEIN NAN DAW DIAMOND WOMEN`S EARRINGS</h4>
              <p class="sn-pd-price font-weight-bold mt-3">1,000,000 <span>Ks</span></p>
              <p class="sn-pd-desc pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              </p>
              <div class="sn-pd-input d-flex">
                <input type="number" name="" id="" value="1">
                <button>ADD TO CART</button>
              </div>
              <p class="border-top mt-4 pt-2">Category: <a href="#" class="sn-pd-cat" style="font-size: 16px;">category name</a></p>
            </div>
          </div>
        </div>
        <div>
          <h5 class="font-weight-bold mt-3 pt-3 mb-4 mt-md-5 border-top">Description</h5>
          <p class="sn-pd-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          </p>
        </div>
        
      </div>


      {{-- Related Products --}}
      <div class="sn-products p-1 p-md-4">
        <h2 class="text-uppercase mb-3 text-left">RELATED PRODUCTS</h2>
        <div class="sn-home-products">
          <div thumbsSlider="" class="swiper relatedProductsSwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/14.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/15.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/16.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/17.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/14.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
              <div class="swiper-slide sn-swiper-wrapper">
                <a href="{{url('/product/1')}}" class="mb-4">
                  <img src="{{ url('images/products/15.jpg') }}" alt="">
                  <span class="sn-category">Necklace</span>
                  <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                  <span class="sn-price">502,000 Ks</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

@endpush