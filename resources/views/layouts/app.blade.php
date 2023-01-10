<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Seinnandaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .eye{
            position: absolute;
            top: 11px;
            right: 22px;
        }

        .sn-login-banner img{
            width: 100%;
            height: calc(100vh);
            object-fit: cover;
        }
        .sn-login-form {
            border: 1px solid #bdbdbd;
            box-shadow: 0px 0px 3px 0px #e1e1e1;
        }
      .sn-login-banner img{
        width: 100%;
        height: calc(100vh);
        object-fit: cover;
      }
      .sn-login-form {
        border: 1px solid #bdbdbd;
        box-shadow: 0px 0px 3px 0px #e1e1e1;
      }
      .sn-login-form #email, .sn-login-form #password, .sn-login-form #name, .sn-login-form #password-confirm {
        width: 100%;
        border-radius: unset;
        border: 1px solid #ddd;
        background: rgba(251, 251, 251, 1);
        padding: 3px;
        height: 40px;
        margin-bottom: 13px;
      }
      .sn-login-button {
        background: #8d021f;
        border: 1px solid #8d021f;
        color: #fff;
        border-radius: 3px;
        padding: 6px 15px;
      }
      .sn-login-container {
        background-image: url("http://127.0.0.1/images/banner/login-banner.png");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
      }

      @media only screen and (min-width: 768px) {
        .sn-login-container {
          background: none;
        }
      }

      /* Tablet */
      @media only screen and (min-width: 600px) {
        .sn-login-form #email, .sn-login-form #password {
            width: 100%;
            border-radius: unset;
            border: 1px solid #ddd;
            background: rgba(251, 251, 251, 1);
            padding: 3px;
            height: 40px;
            margin-bottom: 13px;
        }
        .sn-login-container {
            background-image: url("http://127.0.0.1/images/banner/login-banner.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        @media only screen and (min-width: 768px) {
            .sn-login-container {
                background: none;
            }
        }

        /* Tablet */
        @media only screen and (min-width: 600px) {
            .sn-login-form #email, .sn-login-form #password {
                width: 270px;
            }
        }
        @media only screen and (min-width: 768px) {

        }

      }
      @media only screen and (min-width: 768px) {

      }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-none">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>
</div>
<script>
    $(document).ready(function () {

        $('#reg .toggleeye').click(function (){
            if($('#reg  .toggleeye').hasClass('fa-eye-slash')){
                $('#reg  .toggleeye').removeClass('fa-eye-slash');
                $('#reg  .toggleeye').addClass('fa-eye');
                $('#reg  .topas').attr('type','text');
            }else{
                $('#reg  .toggleeye').removeClass('fa-eye');
                $('#reg  .toggleeye').addClass('fa-eye-slash');
                $('#reg  .topas').attr('type','password');
            }


        })
        $('#con .toggleeye').click(function (){
            if($('#con  .toggleeye').hasClass('fa-eye-slash')){
                $('#con  .toggleeye').removeClass('fa-eye-slash');
                $('#con  .toggleeye').addClass('fa-eye');
                $('#con  .topas').attr('type','text');
            }else{
                $('#con  .toggleeye').removeClass('fa-eye');
                $('#con  .toggleeye').addClass('fa-eye-slash');
                $('#con  .topas').attr('type','password');
            }


        })
        $('#adminLogin .toggleeye').click(function (){
            if($('#adminLogin .toggleeye').hasClass('fa-eye-slash')){
                $('#adminLogin .toggleeye').removeClass('fa-eye-slash');
                $('#adminLogin .toggleeye').addClass('fa-eye');
                $('#adminLogin .topas').attr('type','text');
            }else{
                $('#adminLogin .toggleeye').removeClass('fa-eye');
                $('#adminLogin .toggleeye').addClass('fa-eye-slash');
                $('#adminLogin .topas').attr('type','password');
            }
        })

    });
</script>



</body>
</html>
