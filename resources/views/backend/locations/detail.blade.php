@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Location Detail'" :subtext="'location detail'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Location Detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                              <div>
                                <h3>{{ $loc->branch_name }}</h3>
                                <div class="mt-4 address">
                                    <i aria-hidden="true" class="fas fa-map-marker-alt mr-3"></i>{{ $loc->address }}<br><br/>
                                </div>
                                <div class="mt-1 address">
                                    <i aria-hidden="true" class="fas fa-mobile-alt mr-3"></i>{{ $loc->phone_number }}
                                </div>
                              </div>

                            </div>
                                <!-- /.card-body -->

                        </div>
                        <!-- /.card -->



                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('scripts')
    <script>
    
    </script>
@endpush
