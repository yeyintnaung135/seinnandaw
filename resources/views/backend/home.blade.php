@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

          @php
            $user_count = \App\User::count();
            $admin_count = \App\Admins::count();
            $banner_count = \App\Banners::count();
            $cat_count = \App\Categories::count();
            $dis_count = \App\Discount::count();
            $loc_count = \App\Locations::count();
            $product_count = \App\Products::count();
          @endphp

          <div class="container-fluid">
            {{-- <img src="{{url('images/logo.png')}}" alt="SeinNanDaw" class="d-block" style="width: 200px;"> --}}
            <div class="container">
              <div class="row sn-dashboard-component">
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $user_count }}</h3>
                    <p>User</p>
                  </div>
                  <a href="{{url('backend/customers/list')}}">More Info</a>
                </div>
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $admin_count }}</h3>
                    <p>Admin</p>
                  </div>
                  <a href="{{url('backend/admin/list')}}" class="">More Info</a>
                </div>
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $product_count }}</h3>
                    <p>Products</p>
                  </div>
                  <a href="{{url('backend/products/list')}}">More Info</a>
                </div>
              </div>
              <div class="row sn-dashboard-component">
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $dis_count }}</h3>
                    <p>Discount</p>
                  </div>
                  <a href="http://" class="d-none">More Info</a>
                </div>
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $cat_count }}</h3>
                    <p>Categories</p>
                  </div>
                  <a href="{{url('backend/categories/list')}}">More Info</a>
                </div>
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $banner_count }}</h3>
                    <p>Banner</p>
                  </div>
                  <a href="{{url('backend/banners/list')}}">More Info</a>
                </div>
              </div>
              <div class="row sn-dashboard-component">
                <div class="col-sm col-md-3 p-0">
                  <div>
                    <h3>{{ $loc_count }}</h3>
                    <p>Locations</p>
                  </div>
                  <a href="{{url('backend/locations/list')}}">More Info</a>
                </div>
              </div>
            </div>
          </div>

            
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('scripts')
  <script>
    
  </script>
@endpush