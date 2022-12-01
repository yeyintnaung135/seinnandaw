<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sein Nan Daw</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/images/favicon.webp') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{url('test/css/fancybox.css')}}"/>
    <link rel="stylesheet" href="{{url('test/css/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <script>
    window.csrf="{{csrf_token()}}"

</script>
    @if(Auth::check() and Auth::user()->role == 'user')
        <script>
            window.authuser = 'yes';
        </script>
    @else
        <script>
            window.authuser = 'no';
        </script>
    @endif


    <script src="{{url('test/js/fancybox.js')}}"></script>
    <script src="{{url('test/js/swiper-bundle.min.js')}}"></script>
    <script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
    <style>


      /* Menu */
      .active a {
        color: #8d021f !important;
      }
      /* end of Menu */
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
        word-wrap: break-word;
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
        width: 276px;
        font-weight: 600;
        padding: 6px 0;
        font-size: 16px;
        letter-spacing: 2px;
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
      .sn-products .sn-category {
        display: block;
      }
      .sn-home-products a {
        width: 50%;
        padding: 0 10px;
      }
      .sn-shop-now-button {
        text-decoration: none !important;
        transition: 0.3s;
        color: #000;
        border: 1px solid;
        padding: 13px 32px;
        left: 32%;
        margin-top: 15px;
        font-size: 0.7rem;
        letter-spacing: 1px;
        font-weight: bold;
      }
      .sn-shop-now-button:hover{
        background: #000;
        color: #fff;
      }

      /* Sub Menu */
      .sn-chevron-down {
        background: none;
        border: none;
        height: 35px;
      }
      .sn-chevron-down:before, .sn-chevron-down:after {
        content: "";
        position: absolute;
        background-color: #000000;
        width: 1px;
        height: 7px;
        transition: transform 0.25s ease-in-out;
      }
      .sn-chevron-down:before {
        transform: translateX(2px) rotate(45deg);
      }
      .sn-chevron-down:after {
        transform: translateX(-2px) rotate(-45deg);
      }

      .sn-sub-menu {
        position: absolute;
        z-index: 99;
        background: #fff;
        padding: 8px 14px;
        width: 250px;
        box-shadow: 0 4px 10px -2px rgb(0 0 0 / 10%);
        border-top: 2px solid #269fb7;
        top: 45px;
      }

      .sn-sub-menu a {
        display: block;
        padding: 8px 0;
        color: #333;
        text-decoration: none;
      }
      .sn-sub-menu a:hover {
        color: #269fb7;
      }
      .sn-sub-menu {
        /* display: none; */
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
      .sn-main-banner  {
        height: 100% !important;
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
      /* .sn-home-products {
        padding: 0px 8px;
      } */
      .sn-home-products img {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1;
        object-fit: cover;
      }
      .sn-swiper-wrapper a {
        display: block;
        width: 130px;
      }

      .sn-cus-start {
        font-size: 18px;
      }
      .swiper-pagination-bullet-active-main {
        background: #8d0220;
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

      /* For Menu Responsive (Mobile) */

      @media only screen and (max-width: 989px) {
        .navbar-light .navbar-toggler {
          border-color: #0000;
          font-size: 16px;
        }
        .sn-nav {
          position: absolute;
          top: 112px;
          width: 100%;
          left: 0px;
          background: rgb(255, 255, 255);
          z-index: 99;
        }
        .sn-nav li {
          border-top: 1px solid #e1e1e1;
        }
        .sn-nav li a {
          padding: 10px 45px;
          position: relative;
        }
        .sn-menu-icon {
          position: relative;
          padding: 11px 8px;
          border-top: 1px solid #e1e1e1;
          border-bottom: 1px solid #e1e1e1;
        }
        .active {
          background: #f7f7f7;
        }
        .sn-sub-menu {
          position: relative;
          border: 0;
          box-shadow: none;
          display: block;
          width: 100%;
          padding: 0;
          top: 0;
        }
        .sn-sub-menu a {
          border-top: 1px solid #e1e1e1;
        }
        .sn-chevron-down {
          right: 10%;
        }
        .sn-chevron-right{
          position: absolute;
          top: 40%;
          left: 35px;
        }
        .sn-chevron-right:before, .sn-chevron-right:after {
          content: "";
          position: absolute;
          background-color: #000000;
          width: 1px;
          height: 7px;
          transition: transform 0.25s ease-in-out;
        }
        .sn-chevron-right:before {
          transform: translateX(-2px) translateY(-1px) rotate(-45deg);
        }
        .sn-chevron-right:after {
          transform: translateX(-2px) translateY(3px) rotate(45deg);
        }
      }
      /* For Menu Responsive */

      /* Tablet Size */
      @media only screen and (min-width: 600px) {
        /* .sn-home-products img {
          width: 140px;
          height: 140px;
        } */
        .sn-swiper-wrapper a {
          width: 140px;
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

        .sn-home-products a {
          width: 33%;
        }
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
            color: #fff !important;
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




        /* .sn-home-products img {
          width: 270px;
          height: 260px;
        } */
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

        .sn-cart-table th, .sn-cart-table td {
            vertical-align: middle;
        }

        .sn-cart-table button, .sn-cart-total-table .sn-to-checkout {
            background: #8d021f;
            color: #fff;
            border: #8d021f;
            width: 250px;
            font-weight: 600;
        }

        /* Profile */
        .pf-active {
          background: #fff;
        }
        .pf-active a {
          color: #323232 !important;
        }
        .pf-container, .or-container, .or-container .table {
          font-size: 18px;
          color: #565656 !important;
        }
        .pf-link {

        }
        .pf-container a, .or-container a {
          color: #269fb7;
          text-decoration: none;
          font-size: 18px;
        }
        .pf-container a:hover, .or-container a:hover {
          color: #323232;
        }
        /* End of Profile */

        /* Order Received */
        .or-container h2, .or-container h3, .or-container h4 {
          color: #000;
        }
        .order-confirm-list li label, .order-bank-list li label {
          font-size: 0.7rem;
          margin-bottom: 0 !important;
        }
        .order-confirm-list li strong, .order-bank-list li strong {
          font-size: 1rem;
        }
        .order-confirm-list .pr-4, .order-bank-list .pr-4 {
          border-right: 1px dashed #dddddd !important;
        }
        .or-container .or-thank {
          border-bottom: 3px solid #ddd;
        }
        .order-bank-list h3 {
          font-size: 1.2rem;
          font-weight: 700;
          color: #000;
        }
        .or-file-upload {
          background: #8d021f;
          border: 1px solid #8d021f;
          color: #fff;
          padding: 6px 35px;
          font-size: 16px;
          letter-spacing: 1px;
        }
        .or-file-upload:hover {
          background: #000;
          border: 1px solid #000;
          cursor: pointer;
        }
        /* End of Order Received */

        /* My Account - orders */
        .order-container {
          font-size: 15px;
        }
        .order-container a, .edit-account-container {
          font-size: 15px;
          text-decoration: none;
          font-weight: 700 !important;
        }
        .order-container .sn-view-order, .go-to-shop-button, .edit-account-save {
          border: 0;
          color: #ffffff !important;
          background-color: #8d021f;
          padding: 10px 35px;
          text-decoration: none;
          letter-spacing: 2px;
        }
        .order-container .sn-view-order:hover, .go-to-shop-button:hover, .edit-account-save:hover {
          background: #000;
          color: #ffffff !important;
        }

        /* My Account - Download */
        .download-container {
          border-top: 3px solid #269fb7;
          padding: 1em
        }

        /* My Account - Edit Address */
        .edit-address-container .edit {
          color: #269fb7;
        }

        /* Tablet Size */
        @media only screen and (min-width: 600px) {
            /* .sn-home-products img {
                width: 140px;
                height: 140px;
            } */

            .sn-swiper-wrapper a {
                width: 140px;
            }

            .relatedProductsSwiper {
                height: 400px;
            }
            .sn-home-products a {
              width: 33%;
            }
            .edit-address-container table {
              width: 48%;
            }
        }

        /* Desktop Size */
        @media only screen and (min-width: 768px) {
            .sn-pd-desc {
                font-size: 17px;
            }

            /* .sn-home-products img {
                width: 270px;
                height: 260px;
            } */

            .sn-swiper-wrapper a {
                width: 270px;
            }
            .sn-home-products a {
              width: 25%;
            }
        }


    </style>
</head>
<body>
<div id="app">
    @include('layouts.frontend.menu')

    @yield('content')

    @include('layouts.frontend.footer')
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{url('/backend/plugins/select2/js/select2.full.min.js')}}"></script>
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



      var bannerSwiper = new Swiper(".myBannerSwiper", {
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });

        function hoverToShowSubMenu(subcat) {
          $(".sn-sub-menu").addClass("d-none");
          $("#"+subcat).removeClass("d-none");
        }
        $(".sn-sub-menu").hover(function() {
            $(this).removeClass("d-none");
        }, function() {
            $(this).addClass("d-none");
        });

        function toggleSubMenu(subcat) {
          $("#"+subcat).toggleClass("d-none");
        }

    </script>

@stack('scripts')
  </body>
</html>










