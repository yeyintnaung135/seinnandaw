@extends('layouts.backend.tablelayouts')
@push('css')
  <style>
    .cursor{
      cursor: help;
    }
  </style>
  
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-alert></x-alert>
        <x-minibackheader :maintext="'Admin list'" :subtext="'Admin list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-12 d-flex justify-content-between">
                                    <h3 class="card-title">Admin list</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="d-flex justify-content-end my-3 align-items-end">
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">From Date</legend>
                                      <input type="text" id='search_fromdate_admin' class="admindatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">To Date</legend>
                                      <input type="text" id='search_todate_admin' class="admindatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="pr-md-4">
                                    <input type='button' id="admin_search_button" value="Search" class="btn bg-info"  >
                                  </div>
                                </div>

                                <table id="adminTable" class="table table-borderless table-hover">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>start</th>
                                      <th>Name</th>
                                      <th>E-mail</th>
                                      <th>Create Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>start</th>
                                      <th>Name</th>
                                      <th>E-mail</th>
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
    var adminTable = $('#adminTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      "url": "{{ url('backend/admin/get_all_admin') }}",
      'data': function(data){
            // Read values
            var from_date = $('#search_fromdate_admin').val() ? $('#search_fromdate_admin').val() + " 00:00:00" : null;
            var to_date = $('#search_todate_admin').val() ? $('#search_todate_admin').val() + " 23:59:59" : null;

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
        {data: 'name'},
        {data: 'email'},
        {data: 'created_at'},
        {data: 'id'}
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
          'targets': [1,5],
          'orderable': false,
          'visible': false
        },
        {
          'targets': [0],
          'orderable': false
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

      "order": [[ 3, "desc" ]],
    })

    $(document).ready(function() {
      $( ".admindatepicker" ).datepicker({
          "dateFormat": "yy-mm-dd",
          changeYear: true
      });

      $('#admin_search_button').click(function(){
        if($('#search_fromdate_admin').val() != null && $('#search_todate_admin').val() != null) {
          adminTable.draw();
        }
      });

      $( ".adminactdatepicker" ).datepicker({
          "dateFormat": "yy-mm-dd",
          changeYear: true
      });

      $('#adminact_search_button').click(function(){
        if($('#search_fromdate_adminact').val() != null && $('#search_todate_adminact').val() != null) {
          adminTable.draw();
        }
      });
    });
  </script>
@endpush
