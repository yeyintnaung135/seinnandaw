@extends('layouts.backend.layout')
@section('title','Sein Nan Daw | Product Edit')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Edit discount'" :subtext="'Edit discount'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Discount</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{url('backend/products/discount/')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$data->id}}">
                                <input type="hidden" name="price" value="{{$data->price}}">
                                <div class="card-body">
                                  <img class="" src="{{url($data->photo)}}" style="width: 100px;height: 100px;">
                                  <h4 class="mb-4 mt-3">Product Name - {{ $data->name }}</h4>
                                  <div class="form-group">
                                    <label for="price">Current Price</label>
                                    <input type="text" name="price" class="form-control  @error('price') is-invalid @enderror" id="price" value="{{old('price',$data->price)}}" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="discount_price">Discount Price</label>
                                    <input type="text" name="discount_price" class="form-control  @error('discount_price') is-invalid @enderror" id="discount_price" value="{{old('discount_price',$data->discount->discount_price)}}" required>
                                    @error('discount_price')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                  <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
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