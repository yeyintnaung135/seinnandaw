@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Payment Detail'" :subtext="'payment detail'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">UserName</label>
                                                <input type="text" value="{{$payment->user->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">PayName</label>
                                                <input type="text" value="{{$payment->pay_name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country</label>
                                                <input type="text" value="{{$payment->country}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City</label>
                                                <input type="text" value="{{$payment->city}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Invoice No</label>
                                                <input type="text" value="{{$payment->invoiceNo}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Transition ID</label>
                                                <input type="text" value="{{$payment->tran_id}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bank</label>
                                                <input type="text" value="{{$payment->bank_name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product</label>
                                                <input type="text" value="{{$payment->product->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount</label>
                                                <input type="text" value="{{$payment->amount}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">State</label>
                                                <input type="text" value="{{$payment->state}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" value="{{$payment->phone}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" value="{{$payment->email}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" value="{{$payment->address}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @if (isset($payment->payment_screenshot))
                                      <img src="{{ url($payment->payment_screenshot) }}" style="width:80%;height:auto;"/>
                                    @endif

                                </div>
                                <!-- /.card-body -->


                            </form>

                            <div class="card-footer">
                                <div class="d-inline-flex float-right">
                                {{-- <div>
                                <a href="" type="button" style=" width: 81px;" class=" btn btn-info btn-sm btn-block">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                </div> --}}
                                &nbsp;
                                <div>
                                <a onclick="Delete()" type="button" style=" width: 81px;" class=" btn btn-danger btn-sm btn-block">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </a>
                                </div>
                                </div>
                                <form id="delete_form"
                                      action="{{route('payment_delete')}}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                    <input type="hidden" name="payment_id" value="{{$payment->id}}"/>
                                </form>
                            </div>

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
    function Delete() {
    $(function () {
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-danger ml-2',
    cancelButton: 'btn btn-info'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true,
    didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    }).then((result) => {
    if (result.isConfirmed) {
    document.getElementById('delete_form').submit();
    }
    })
    });
    } ;
    </script>
@endpush
