@extends('layouts.backend.tablelayouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-alert></x-alert>
        <x-minibackheader :maintext="'Products list'" :subtext="'products list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-6 col-md-8">
                                    <h3 class="card-title">Products list</h3>

                                </div>

                                <div class="col-6 col-md-4" style="width:122px;">
                                    <a type="button" href="{{url('backend/products/add')}}"
                                       class="btn btn-block btn-primary btn-sm">create new</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Create Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)

                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>
                                            <td><img style="width:100px;height:100px;" src="{{url($d->photo)}}"></td>

                                            <td>{{$d->price}} Ks</td>

                                            <td>
                                                {{date('F d, Y ( h:i A )', strtotime($d->created_at))}}
                                            </td>
                                            <td>
                                                <a href="{{url('product/detail/'.$d->id)}}" type="button" style=" width: 81px;" class="btn btn-primary btn-sm btn-block">
                                                    <i class="fa fa-info-circle"></i>
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Price</th>

                                        <th>Create Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </tfoot>
                                </table> --}}
                                <div class="d-flex justify-content-end my-3 align-items-end">
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">From Date</legend>
                                      <input type="text" id='search_fromdate_products' class="productsdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">To Date</legend>
                                      <input type="text" id='search_todate_products' class="productsdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="pr-md-4">
                                    <input type='button' id="products_search_button" value="Search" class="btn bg-info"  >
                                  </div>
                                </div>

                                <table id="productsTable" class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Photo</th>
                                      <th>Price</th>
                                      <th>Create Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Photo</th>
                                      <th>Price</th>
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
    var productsTable = $('#productsTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      "url": "{{ url('backend/products/get_all_products') }}",
      'data': function(data){
            // Read values
            var from_date = $('#search_fromdate_products').val() ? $('#search_fromdate_products').val() + " 00:00:00" : null;
            var to_date = $('#search_todate_products').val() ? $('#search_todate_products').val() + " 23:59:59" : null;

            // Append to data
            data.searchByFromdate = from_date;
            data.searchByTodate = to_date;
        }
      },
      columns: [
        {data: 'id'},
        {data: 'name'},
        {
          data: 'photo',
          render: function(data, type) {
            var image = `<img style="width:200px;height:100px;" src="{{url(':img')}}">`;
            image = image.replace(':img', data);
            return image;
          }
        },
        {
          data: 'price',
          render: function(data, type) {
            var price = data + " Ks";
            return price;
          }
        },
        {data: 'created_at'},
        {
          data: 'id',
          render: function(data, type) {
            var detail = `<a href="{{url('product/detail/'. ':id')}}" type="button" style=" width: 81px;" class="btn btn-primary btn-sm btn-block">
                            <i class="fa fa-info-circle"></i>
                            Detail
                        </a>`;
            detail=detail.replace(':id', data);
            return detail;
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
        { responsivePriority: 4, targets: 4},
        {
          'targets': [5],
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

      "order": [[ 4, "desc" ]],

    });

  $(document).ready(function() {
    $( ".productsdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#products_search_button').click(function(){
      if($('#search_fromdate_products').val() != null && $('#search_todate_products').val() != null) {
        productsTable.draw();
      }
    });

    $( ".productsactdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#productsact_search_button').click(function(){
      if($('#search_fromdate_productsact').val() != null && $('#search_todate_productsact').val() != null) {
        productsTable.draw();
      }
    });
  });
  </script>
@endpush
