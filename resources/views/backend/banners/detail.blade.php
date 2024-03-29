@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Banner Detail'" :subtext="'Banner detail'"/>
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
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Photo</label><br>
                                      <img style="width:100%;" src="{{url($data->photo)}}">
                                    </div>



                                </div>
                                <!-- /.card-body -->



                            </form>
                            <div class="card-footer">
                                <div class="d-inline-flex float-right">
                                <div>
                                <a href="{{url('backend/banners/edit/'.$data->id)}}" type="button" style=" width: 81px;" class=" btn btn-info btn-sm btn-block">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                </div>
                                &nbsp;
                                <div>
                                <a onclick="Delete()" type="button" style=" width: 81px;" class=" btn btn-danger btn-sm btn-block">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </a>
                                </div>
                                </div>
                                <form id="delete_form"
                                      action="{{ url('backend/banners/delete') }}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->id}}"/>
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
