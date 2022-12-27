@extends('layouts.backend.tablelayouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-alert></x-alert>
        <x-minibackheader :maintext="'Banners list'" :subtext="'Banners photos list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-12  d-flex justify-content-between">
                                    <h3 class="card-title">Banners list</h3>
                                    <a type="button" href="{{url('backend/banners/add')}}"
                                       class="btn btn-primary btn-sm">create new</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="d-flex justify-content-end my-3 align-items-end">
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">From Date</legend>
                                      <input type="text" id='search_fromdate_banners' class="bannersdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">To Date</legend>
                                      <input type="text" id='search_todate_banners' class="bannersdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="pr-md-4">
                                    <input type='button' id="banners_search_button" value="Search" class="btn bg-info"  >
                                  </div>
                                </div>

                                <table id="bannersTable" class="table table-borderless table-hover">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>start</th>
                                      <th>Photo</th>
                                      <th>Create Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>start</th>
                                      <th>Photo</th>
                                      <th>Create Date</th>
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
    var bannersTable = $('#bannersTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      "url": "{{ url('backend/banners/get_all_banners') }}",
      'data': function(data){
            // Read values
            var from_date = $('#search_fromdate_banners').val() ? $('#search_fromdate_banners').val() + " 00:00:00" : null;
            var to_date = $('#search_todate_banners').val() ? $('#search_todate_banners').val() + " 23:59:59" : null;

            // Append to data
            data.searchByFromdate = from_date;
            data.searchByTodate = to_date;
        }
      },
      columns: [
        {
          title: 'id',
          data: null,
          render: (data, type, row, meta) => meta.row + 1 + Number(row['start'])
        },
        {data: 'start'},
        {
          data: 'photo',
          render: function(data, type) {
            var image = `<img style="width:200px;height:100px;" src="{{url(':img')}}">`;
            image = image.replace(':img', data);
            return image;
          }
        },
        {data: 'created_at'},
        {
          data: 'id',
          render: function(data, type) {
            var detail = `<a href="{{url('backend/banners/detail/'. ':id')}}" role="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Shop Detail">
                              <i class="fa fa-eye"></i>
                          </a>`;
            detail=detail.replace(':id', data);
            var edit = `<a href="{{url('backend/banners/edit/'. ':id')}}" role="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Shop Edit">
                            <i class="fa fa-edit"></i>
                        </a>`;
            edit=edit.replace(':id', data);
            var dlt = `<button type="button" onclick="deleteShop(:id)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Move To Trash">
                              <i class="fa fa-trash"></i>
                          </button>`;
            dlt=dlt.replaceAll(':id', data);
            var form = `<form action="{{url('/backend/banners/delete')}}" id="deleteform_:id" method="post">
                            @csrf
                            <input type="hidden" name="id" value=":id">
                        </form>`;
            form=form.replaceAll(':id', data);

            return detail + edit + dlt + form;
          }
        }
      ],
      responsive: true,
      lengthChange: true,
      autoWidth: false,
      paging: true,
      dom: 'Blfrtip',
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 2 },
        { responsivePriority: 3, targets: 3},
        {
          'targets': [0,4],
          'orderable': false,
        },
        {
          'targets': [1],
          'visible': false,
        }
      ],
      language: {
        // "search" : '<i class="fa fa-search"></i>',
        "searchPlaceholder": 'Search ...',
        paginate: {
          next: '<i class="fa fa-angle-right"></i>', // or '→'
          previous: '<i class="fa fa-angle-left"></i>' // or '←'
        }
      },

      "order": [[ 2, "desc" ]],

    });

  $(document).ready(function() {
    $( ".bannersdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#banners_search_button').click(function(){
      if($('#search_fromdate_banners').val() != null && $('#search_todate_banners').val() != null) {
        bannersTable.draw();
      }
    });

    $( ".bannersactdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#bannersact_search_button').click(function(){
      if($('#search_fromdate_bannersact').val() != null && $('#search_todate_bannersact').val() != null) {
        bannersTable.draw();
      }
    });
  });

  function deleteShop(id) {
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
            $('#deleteform_'+id).submit();
          }
      })
  });
  }
  </script>
@endpush
