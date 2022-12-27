@extends('layouts.backend.tablelayouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-alert></x-alert>
        <x-minibackheader :maintext="'Locations list'" :subtext="'Locations list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-12 d-flex justify-content-between">
                                    <h3 class="card-title">Locations list</h3>
                                    <a type="button" href="{{url('backend/locations/add')}}"
                                       class="btn btn-primary btn-sm">create new</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="locationsTable" class="table table-borderless table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Branch Name</th>
                                      <th>Address</th>
                                      <th>Phone Number</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ( $loc as $l )
                                      <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $l->branch_name }}</td>
                                        <td>{{ $l->address }}</td>
                                        <td>{{ $l->phone_number }}</td>
                                        <td class="d-flex">
                                          <a href="{{url('backend/locations/detail/'. $l->id)}}" type="button" style=" width: 40px;" class="btn btn-primary btn-sm mr-2">
                                            <i class="fa fa-info-circle"></i>
                                            
                                          </a>
                                          <a href="{{url('backend/locations/edit/'. $l->id)}}" type="button" style=" width: 40px;" class="btn btn-primary btn-sm mr-2">
                                            <i class="fa fa-edit"></i>
                                            
                                          </a>
                                          <a onclick="Delete({{ $l->id }})" type="button" style=" width: 40px;" class=" btn btn-danger btn-sm mr-2">
                                            <i class="fa fa-trash"></i>
                                            <form id="{{ 'delete_form'.$l->id }}"
                                                action="{{ url('backend/locations/delete') }}"
                                                method="POST"
                                                style="display: none;">
                                              @csrf
                                              <input type="hidden" name="id" value="{{$l->id}}"/>
                                          </form>
                                          </a>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th>ID</th>
                                      <th>Branch Name</th>
                                      <th>Address</th>
                                      <th>Phone Number</th>
                                      <th>Action</th>
                                    </tr>
                                  </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function () {
        $('#locationsTable').DataTable({
          responsive: true,
          language: {
            // "search" : '<i class="fa fa-search"></i>',
            "searchPlaceholder": 'Search ...',
            paginate: {
              next: '<i class="fa fa-angle-right"></i>', // or '→'
              previous: '<i class="fa fa-angle-left"></i>' // or '←'
            }
          },
        });
    });
    function Delete(id) {
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
          document.getElementById('delete_form'+id).submit();
        }
        })
      });
    } ;
  </script>
@endpush
