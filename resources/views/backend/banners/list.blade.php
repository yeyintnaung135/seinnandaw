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
                                <div class="col-6 col-md-8">
                                    <h3 class="card-title">Banners list</h3>

                                </div>

                                <div class="col-6 col-md-4" style="width:122px;">
                                    <a type="button" href="{{url('backend/banners/add')}}"
                                       class="btn btn-block btn-primary btn-sm">create new</a>
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

                                <table id="bannersTable" class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Photo</th>
                                      <th>Create Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>ID</th>
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
        {data: 'id'},
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
            var dlt = `<button type="button" onclick="deleteShop(this)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Move To Trash">
                              <i class="fa fa-trash"></i>
                          </button>`;
            dlt=dlt.replace(':id', data);
            return detail + edit + dlt;
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
          'targets': [3],
          'orderable': false,
        }
      ],
      language: {
        "search" : '<i class="fa-solid fa-search"></i>',
        "searchPlaceholder": 'Search',
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

  function deleteShop(e){
    if (window.confirm("Are you sure to delete?")) {
    $('#deleteform').submit();
    }
  }
  </script>
@endpush
