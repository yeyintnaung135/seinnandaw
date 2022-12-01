@extends('layouts.backend.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Category Detail'" :subtext="'category detail'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" value="{{$data->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"  disabled>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>



                                </div>
                                <!-- /.card-body -->



                            </form>
                            @if($data->name != 'all')
                            <div class="card-footer">
                                <div class="d-inline-flex float-right">
                                <div>
                                <a href="{{url('backend/categories/edit/'.$data->id)}}" type="button" style=" width: 81px;" class=" btn btn-info btn-sm btn-block">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                </div>
                                &nbsp;
                                @if ($data->def != 1)
                                <div>
                                <a onclick="Delete()" type="button" style=" width: 81px;" class=" btn btn-danger btn-sm btn-block">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </a>
                                </div>
                                @endif
                                </div>
                                @if ($data->def != 1)
                                <form id="delete_form"
                                      action="{{ url('backend/categories/delete') }}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->id}}"/>
                                </form>
                                @endif
                            </div>
                                @endif
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
