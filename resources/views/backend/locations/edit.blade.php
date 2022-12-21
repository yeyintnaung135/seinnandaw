@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Edit location'" :subtext="'Edit location'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Location</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{url('backend/locations/edit')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$loc->id}}">

                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="branchName">Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control  @error('branch_name') is-invalid @enderror" id="branchName" value="{{old('branch_name',$loc->branch_name)}}" placeholder="Enter Branch Name" required>
                                    @error('branch_name')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" id="Address" value="{{old('address',$loc->address)}}" placeholder="Enter Address" required>
                                    @error('address')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="phoneNumbers">Phone Number (eg. 01 2345, 02 2345)</label>
                                    <input type="text" name="phone_number" class="form-control  @error('phone_number') is-invalid @enderror" id="phoneNumbers" value="{{old('phone_number',$loc->phone_number)}}" placeholder="Enter Phone Number" required>
                                    @error('phone_number')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                <!-- /.card-body -->

                                <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
    <script src="{{url('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    <script>

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
