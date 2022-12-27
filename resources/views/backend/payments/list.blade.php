@extends('layouts.backend.tablelayouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-alert></x-alert>
        <x-minibackheader :maintext="'Payment list'" :subtext="'payment list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-12  d-flex justify-content-between">
                                    <h3 class="card-title">Payment list</h3>
                                    {{-- <a type="button" href=""
                                       class="btn btn-primary btn-sm">create new</a> --}}
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <div class="d-flex justify-content-end my-3">
                                    <div class="form-group mr-md-2">
                                        <fieldset>
                                        <legend>From Date</legend>
                                        <input type="text" id='search_fromdate_shopact' class="shopactdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                        </fieldset>
                                    </div>
                                    <div class="form-group mr-md-2">
                                        <fieldset>
                                        <legend>To Date</legend>
                                        <input type="text" id='search_todate_shopact' class="shopactdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                        </fieldset>
                                    </div>
                                    <div class="pr-md-4">
                                        <input type='button' id="shopact_search_button" value="Search" class="btn bg-info" style="margin-top: 42px;">
                                    </div>
                                </div> --}}
                                <table id="payment_table" class="table table-borderless table-hover table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>start</th>
                                        <th>Username</th>
                                        <th>Product</th>
                                        <th>PayName</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Amount</th>
                                        <th>Bank</th>
                                        <th>Created_date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>start</th>
                                        <th>Username</th>
                                        <th>Product</th>
                                        <th>PayName</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Amount</th>
                                        <th>Bank</th>
                                        <th>Created_date</th>
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
<script type="text/javascript">
// alert("hello");
    var userregister_table = $('#payment_table').DataTable({
     processing: true,
     serverSide: true,
     ajax: {
     "url": "{{ route('get_payment_lists') }}",
     'data': function(data){
           // Read values
           var from_date = $('#search_fromdate_shopact').val() ? $('#search_fromdate_shopact').val() + " 00:00:00" : null;
           var to_date = $('#search_todate_shopact').val() ? $('#search_todate_shopact').val() + " 23:59:59" : null;

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
       {data: 'user'},
       {data: 'product'},
       {data: 'pay_name'},
       {data: 'email'},
       {data: 'country'},
       {data: 'amount'},
       {data: 'bank'},
       {data: 'created_at'},
       {
         data: 'id',
         render: function(data) {
            return `
            <form action="{{url('/backend/payments/detail')}}" method="get">
                @csrf
                <input type="hidden" value="${data}" name="payment_id">
                <button type="submit" data-id="${data}" class="btn btn-info" id="detail" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i data-id="${data}" id="detail" class="fa fa-info-circle"></i></button>
            </form>

            `
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
      {
        'targets': [0,2,3,8],
        'orderable': false
      },
      {
        'targets': [1],
        'visible': false
      }
     ],
     language: {
       "searchPlaceholder": 'Search ...',
       paginate: {
         next: '<i class="fa fa-angle-right"></i>', // or '→'
         previous: '<i class="fa fa-angle-left"></i>' // or '←'
       }
     },
     "order": [[ 9, "desc" ]],

 });
 $(document).ready(function() {

         $( ".shopactdatepicker" ).datepicker({
             "dateFormat": "yy-mm-dd",
             changeYear: true
         });

         $('#shop_search_button').click(function(){
           if($('#search_fromdate_shop').val() != null && $('#search_todate_shop').val() != null) {
             shopsTable.draw();
           }
         });

         $( ".shopactdatepicker" ).datepicker({
             "dateFormat": "yy-mm-dd",
             changeYear: true
         });

         $('#shopact_search_button').click(function(){
           if($('#search_fromdate_shopact').val() != null && $('#search_todate_shopact').val() != null) {
             payment_table.draw();
           }
         });
       });


       $(document).on('click','#detail',(e) => {
        // let id = $(this).data('id');
        console.log(e);
        console.log(e.target.getAttribute('data-id'));
        var id = e.target.getAttribute('data-id');

    });
</script>

@endpush
