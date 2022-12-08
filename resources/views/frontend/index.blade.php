@extends('layouts.frontend.frontend')
@section('title','Sein Nan Daw | Home')
@section('content')
    <section>

        {{-- banner --}}
        {{-- <div class="sn-main-banner">
            <img src="{{ url('images/banner/banner.png') }}" alt="SeinNanDaw">
        </div> --}}
        <div class="sn-main-banner swiper myBannerSwiper">
            <?php
            $banners=\App\Banners::all();
            ?>
          <div class="swiper-wrapper">
              @foreach($banners as $b)
            <img src="{{ url($b->photo) }}" alt="SeinNanDaw" class="swiper-slide">
              @endforeach

          </div>
          <div class="swiper-pagination d-none"></div>
        </div>
        <div class="container-fluid">
            {{-- Featured Products --}}
            <div class="sn-products">
                <h2 class="my-3">FEATURED PRODUCTS</h2>
                <p>Shop fine jewelry creations of timeless beauty</p>
                <div class="sn-home-products d-flex flex-wrap mt-5">
                    @foreach($data as $d)
                        <a href="{{url('/product/detail/'.$d->id)}}" class="mb-4">
                            <img src="{{ url($d->photo) }}" alt=""><br>

                       @php
                       $cat = \App\Categories::where('id', $d->category_id)->first(); 
                       @endphp     
                            @if (!empty($cat))
                            <span class="sn-category my-2">
                                {{strtoupper($cat->name)}}
                            </span>
                            @else
                            <span class="sn-category my-2">
                              Uncategorized
                            </span>
                            @endif
                            <h3 class="sn-product-title">
                                {{strtoupper($d->name)}}
                            </h3>
                            <span class="sn-price">{{$d->price}} Ks</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- New Arrival Banner --}}
            @if ($new_arrival)
            <div class="sn-new-arrival my-5 py-3 row mx-1 mb-2 position-relative">
                <div class="sn-new-banner col-12 col-md-6 m-0 p-0 mb-5">
                    <img src="{{ url($new_arrival->photo) }}" alt="New Arrival">
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="sn-new-title position-absolute">NEW<br/> ARRIVALS</h1>
                    <a href="{{url('/shop')}}" class="position-absolute sn-shop-now-button">SHOP NOW</a>
                </div>
            </div>                
            @endif

            {{-- RECOMMENDED FOR YOU --}}
            <div class="sn-products pt-5">
                <h4>JEWELRY FOR EVERY OCCASION</h4>
                <h2 class="my-3">RECOMMENDED FOR YOU</h2>
                <p>Our Bestsellers</p>
                <div class="sn-home-products d-flex flex-wrap mt-5">
                    <a href="{{url('/product/1')}}" class="mb-4">
                        <img src="{{ url('images/products/14.jpg') }}" alt="">
                        <span class="sn-category my-2">Necklace</span>
                        <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                        <span class="sn-price">502,000 Ks</span>
                    </a>
                    <a href="{{url('/product/1')}}" class="mb-4">
                        <img src="{{ url('images/products/15.jpg') }}" alt="">
                        <span class="sn-category my-2">Necklace</span>
                        <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                        <span class="sn-price">502,000 Ks</span>
                    </a>
                    <a href="{{url('/product/1')}}" class="mb-4">
                        <img src="{{ url('images/products/16.jpg') }}" alt="">
                        <span class="sn-category my-2">Necklace</span>
                        <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                        <span class="sn-price">502,000 Ks</span>
                    </a>
                    <a href="{{url('/product/1')}}" class="mb-4">
                        <img src="{{ url('images/products/17.jpg') }}" alt="">
                        <span class="sn-category my-2">Necklace</span>
                        <h3 class="sn-product-title">White Gold Women's Necklace</h3>
                        <span class="sn-price">502,000 Ks</span>
                    </a>
                </div>
            </div>

            {{-- Info --}}
            <div
                class="sn-main-info d-flex justify-content-around flex-column flex-md-row my-5 py-1 py-md-5 text-center">
                <div class="mb-3">
                    <i class="fa fa-tag"></i>
                    <h4>PROMOTIONS</h4>
                    <p>Follow our Facebook page<br/> for best deals</p>
                </div>
                <div>
                    <i class="fa fa-truck"></i>
                    <h4>SHIPPING INFO</h4>
                    <p>We offer complimentary shipping and easy<br/> returns on all orders</p>
                </div>
                <div>
                    <i class="fa fa-map-marker"></i>
                    <h4>LOCATIONS</h4>
                    <p>11 store locations<br/>countrywide</p>
                </div>
            </div>

            {{-- Our Happy Customer --}}
            <div class="mx-3">
                <div class="sn-cus-start">
                    <i class="fa fa-star mr-1"></i>
                    <i class="fa fa-star mr-1"></i>
                    <i class="fa fa-star mr-1"></i>
                    <i class="fa fa-star mr-1"></i>
                    <i class="fa fa-star mr-1"></i>
                </div>
                <h2 class="sn-cus-title mt-4 mb-5 font-weight-bold">OUR HAPPY CUSTOMERS</h2>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage1.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage1.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage2.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage2.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage3.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage3.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage4.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage4.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage5.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage5.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage6.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage6.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage7.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage7.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0"
                         data-src="{{url('/images/testimonials/ClientImage8.png')}}" data-fancybox="seinnandaw">
                        <img src="{{ url('images/testimonials/ClientImage8.png') }}" width="1920" height="1280"
                             class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush
