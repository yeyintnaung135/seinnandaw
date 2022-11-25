<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seinnandaw</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">
    @stack('css')

    <link rel="stylesheet" type="text/css" href="{{url('backend/plugins/jquery-ui/jquery-ui.min.css')}}">
  
    <link rel="stylesheet" href="{{url('backend/plugins/daterangepicker/daterangepicker.css')}}">
    
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


@include('layouts.backend.navbar')
@include('layouts.backend.sidebar')
    @yield('content')
    <!-- Content Wrapper. Contains page content -->
@include('layouts.backend.footer')


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>\

<script src="{{url('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{url('backend/plugins/sweetalert2/sweetalert2.all.js')}}"></script>

<script src="{{url('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('backend/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
@stack('scripts')
</body>
</html>
