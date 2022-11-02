<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sein Nan Daw</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/images/favicon.webp') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" href="{{url('test/css/fancybox.css')}}" />
    <link rel="stylesheet" href="{{url('test/css/swiper-bundle.min.css')}}" />
      <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{url('test/js/fancybox.js')}}"></script>
    <script src="{{url('test/js/swiper-bundle.min.js')}}"></script>
    <style>
      .active {
        color: #8d021f !important;
      }

      .shopping-bag-badge {
        background: #fff;
        box-shadow: 1px 1px 2px 0px #b9b9b9;
        padding: 6px 7px 5px 8px;
        border-radius: 50%;
        font-size: 10px;
        font-weight: 600;
        position: absolute;
        top: -13px;
        right: -20px;
      }

      .sn-pd-cat {
        color: #269fb7;
        font-size: 18px;
        text-decoration: none !important;
      }
      .sn-pd-price {
        color: #565656;
        font-size: 22px;
      }
      .sn-pd-desc {
        font-size: 16px;
      }
      .sn-pd-input input {
        width: 60px;
        border: 1px solid #c7c7c7;
        padding: 6px 5px;
        text-align: center;
        margin-right: 15px;
      }
      .sn-pd-input button, .sn-place-order-button {
        background: #8d021f;
        color: #fff;
        border: #8d021f;
        width: 250px;
        font-weight: 600;
      }

      .sn-cart-table button:hover,
      .sn-cart-total-table .sn-to-checkout:hover,
      .sn-pd-input button:hover,
      .sn-place-order-button:hover {
        background: #000;
      }

      .form-control {
        border-radius: 0 !important;
        padding: 20px 15px;
      }
      .sn-place-order-button {
        border-radius: 0 !important;
        padding: 12px 7px;
        width: 100%
      }

      /* Swiper */

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
      }

      .swiper-slide {
        background-size: cover;
        background-position: center;
      }

      .productDetailSwiper {
        height: 80%;
        width: 100%;
      }

      .productDetailSwiperthumb {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
      }

      .productDetailSwiperthumb .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
      }

      .productDetailSwiperthumb .swiper-slide-thumb-active {
        opacity: 1;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .sn-home-products img {
        width: 130px;
        height: 130px;
      }
      .sn-swiper-wrapper a {
        display: block;
        width: 130px;
      }

      /* Cart */
      .ast-close-svg {
        border: 1px solid #a5a5a5;
        border-radius: 50%;
        padding: 1px;
        cursor: pointer;
      }
      .ast-close-svg path {
        color: #a5a5a5;
      }
      .sn-cart-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
      }
      .sn-cart-table th, .sn-cart-table td{
        vertical-align: middle;
      }
      .sn-cart-table button, .sn-cart-total-table .sn-to-checkout{
        background: #8d021f;
        color: #fff;
        border: #8d021f;
        width: 250px;
        font-weight: 600;
      }

      /* Tablet Size */
      @media only screen and (min-width: 600px) {
        .sn-home-products img {
          width: 140px;
          height: 140px;
        }
        .sn-swiper-wrapper a {
          width: 140px;
        }
        .relatedProductsSwiper {
          height: 400px;
        }
      }

      /* Desktop Size */
      @media only screen and (min-width: 768px) {
        .sn-pd-desc {
          font-size: 17px;
        }
        .sn-home-products img {
          width: 270px;
          height: 260px;
        }
        .sn-swiper-wrapper a {
          width: 270px;
        }
      }
    </style>
  </head>
  <body>
    @include('layouts.frontend.menu')

    @yield('content')

    @include('layouts.frontend.footer')
    <script>
      var swiper = new Swiper(".productDetailSwiperthumb", {
        loop: false,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: false,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".productDetailSwiper", {
        loop: false,
        spaceBetween: 10,
        thumbs: {
          swiper: swiper,
        },
      });

      var relatedProductsSwiper = new Swiper(".relatedProductsSwiper", {
        loop: false,
        spaceBetween: 0,
        slidesPerView: 2,
        freeMode: true,
        watchSlidesProgress: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          '480': {
            slidesPerView: 3,},
          '640': {
            slidesPerView: 4,},
        },
      });
    </script>
  </body>
</html>
