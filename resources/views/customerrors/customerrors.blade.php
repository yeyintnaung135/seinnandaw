<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('bst/js/jquery.js') }}"></script>
    <script src="{{ asset('bst/js/popper.min.js') }}"></script>
    <script src="{{ asset('bst/js/bootstrap.js') }}"></script>
    @stack('style-yk')
    <script>
        $(function () {
            setTimeout(function () {
                $(".myAlert").fadeOut();
            }, 3000)

            $('[data-toggle="tooltip"]').tooltip()

            $("#filer_by_date").on('change', function () {
                $("#form_filter_by_date").submit();
            })
            $("#filter_by_month").on('change', function () {
                $("#form_filter_by_month").submit();
            })
        })
    </script>
    <!-- Styles -->
    <link href="{{ asset('bst/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet">
    <style>
        .myAlert {
            position: absolute;
            top: 80px;
            right: 20px;
        }

        .yk-logo {
            height: 54px;
            width: 60px;
            border-radius: 33px;
        }

        .yk-nav {
            height: 70px;
            background-image: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(73, 9, 121, 0.9920343137254902) 14%, rgba(0, 212, 255, 1) 100%) !important;
        }

        .yk-color {
            background: linear-gradient(27deg, rgba(2, 0, 36, 1) 0%, rgba(9, 15, 121, 0.6811099439775911) 63%, rgba(0, 212, 255, 1) 72%);

        }

        .yk-main-color {
            background-image: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(73, 9, 121, 0.9920343137254902) 14%, rgba(0, 212, 255, 1) 100%) !important;

        }

        .foot-color {
            background: #2a639d !important;
        }
    </style>
</head>
<body>


<div id="notfound">
    <div class="notfound">
        <div class="notfound-404 mb-5">
            <h1>4<span>0</span>4 {{$data}}</h1>
        </div>
        <a href="{{url('/')}}">home page</a>
    </div>
</div>
{{----}}
</body>
</html>

