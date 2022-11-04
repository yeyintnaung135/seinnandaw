@extends('layouts.frontend.frontend')

@section('content')
    <section>
        {{-- banner --}}
        <div class="sn-main-banner">
            <img src="{{ url('images/banner/banner.png') }}" alt="SeinNanDaw">
        </div>
        <div class="container-fluid">
            {{-- Featured Products --}}
            <div class="sn-products">
                <h2>FEATURED PRODUCTS</h2>
                <p>Shop fine jewelry creations of timeless beauty</p>
                <div class="sn-home-products row">
                    @foreach($data as $d)
                        <a href="{{url('/product/detail/'.$d->id)}}" class="col-6 col-md-4 col-lg-3 mb-4">
                            <img src="{{ url($d->photo) }}" alt=""><br>

                       <?php
                                $cat = \App\Categories::where('id', $d->category_id)->first();
                                ?>
                            <span class="sn-category">
                                {{strtoupper($cat->name)}}
                            </span>
                            <h3 class="sn-product-title">
                                {{strtoupper($d->name)}}
                            </h3>
                            <span class="sn-price">{{$d->price}} Ks</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- New Arrival Banner --}}
            <div class="sn-new-arrival my-5 py-3 row mx-1 mb-2 position-relative">
                <div class="sn-new-banner col-12 col-md-6 m-0 p-0 mb-5">
                    <img src="{{ url('images/banner/newarrivalbanner.png') }}" alt="New Arrival">
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="sn-new-title position-absolute">NEW<br/> ARRIVALS</h1>
                    <a href="{{url('/shop')}}" class="position-absolute">SHOP NOW</a>
                </div>
            </div>

            {{-- RECOMMENDED FOR YOU --}}
            <div class="sn-products pt-5">
                <h4>JEWELRY FOR EVERY OCCASION</h4>
                <h2>RECOMMENDED FOR YOU</h2>
                <p>Our Bestsellers</p>
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
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h2 class="sn-cus-title mt-2 mb-4">OUR HAPPY CUSTOMERS</h2>

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
