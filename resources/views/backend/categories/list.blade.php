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
        <x-minibackheader :maintext="'Category list'" :subtext="'category list'"/>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header row no-gutters">
                                <div class="col-12 d-flex justify-content-between">
                                    <h3 class="card-title">Categories list</h3>
                                    <div>
                                       <a type="button" href="{{url('backend/categories/add')}}" class="btn btn-primary btn-sm">create new</a>
                                       <button id="multipleDelete" onclick="Delete()" type="button" class=" btn btn-danger btn-sm d-none ">
                                            <i class="fa fa-trash"></i>
                                                Multiple Delete
                                        </button>
                                        <form id="delete_form" action="{{ route('category.multiple.trash') }}"method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="" id="itemId"/>
                                        </form>
                                     </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="d-flex justify-content-end my-3 align-items-end">
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">From Date</legend>
                                      <input type="text" id='search_fromdate_categories' class="categoriesdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="form-group m-0 mr-1">
                                    <fieldset>
                                      <legend class="small m-0">To Date</legend>
                                      <input type="text" id='search_todate_categories' class="categoriesdatepicker form-control" placeholder='Choose date' autocomplete="off"/>
                                    </fieldset>
                                  </div>
                                  <div class="pr-md-4">
                                    <input type='button' id="categories_search_button" value="Search" class="btn bg-info"  >
                                  </div>
                                </div>

                                <table id="categoriesTable" class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th>Select</th>
                                      <th>Name</th>
                                      <th>Create Date</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Select</th>
                                      <th>Name</th>
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
   let data = new Array();
     localData = localStorage.setItem("localData", JSON.stringify(data));
    function checkbox(e) {
       
            if ($(e).is(':checked')) {

               
                $("#multipleDelete").removeClass('d-none');
                data.push(e.value);

                $("#itemId").val(data);
                localData = localStorage.setItem("localData", JSON.stringify(data));
               
            } else {
              
                const index = data.indexOf(e.value);
                if (index > -1) {
                    data.splice(index, 1);
                }
                if (data.length === 0) {
                    $("#multipleDelete").addClass('d-none');
                }
                $("#itemId").val(data);

                localData = localStorage.removeItem("localData", JSON.stringify(data));
            
            }
    }

    
  var categoriesTable = $('#categoriesTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
    "url": "{{ url('backend/categories/get_all_categories') }}",
    'data': function(data){
          // Read values
          var from_date = $('#search_fromdate_categories').val() ? $('#search_fromdate_categories').val() + " 00:00:00" : null;
          var to_date = $('#search_todate_categories').val() ? $('#search_todate_categories').val() + " 23:59:59" : null;

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate = to_date;
      }
    },
    columns: [
      {
          data: 'id',
          render: function (data, type,row) {
            console.log(row)
              if(row.def === 1){
                return `<i class="fas fa-exclamation-circle cursor" title="This is the default category and it cannot be deleted.It will be automatically assigned to products with no category"></i>`;
              }
              let localRetri = JSON.parse(window.localStorage.getItem("localData")) || [];
              return (localRetri.length == 0) ? `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}">`
                  : (localRetri.find(element => element == data) == data)
                      ? `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}" checked>`
                      : `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}">`
            }
        },
      {data: 'name'},
      {data: 'created_at'},
      {
        data: 'id',
        render: function(data, type) {
          var detail = `<a href="{{url('backend/categories/detail/'. ':id')}}" type="button" style=" width: 81px;" class="btn btn-primary btn-sm btn-block">
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
   };

  $(document).ready(function() {
    $( ".categoriesdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#categories_search_button').click(function(){
      if($('#search_fromdate_categories').val() != null && $('#search_todate_categories').val() != null) {
        categoriesTable.draw();
      }
    });

    $( ".categoriesactdatepicker" ).datepicker({
        "dateFormat": "yy-mm-dd",
        changeYear: true
    });

    $('#categoriesact_search_button').click(function(){
      if($('#search_fromdate_categoriesact').val() != null && $('#search_todate_categoriesact').val() != null) {
        categoriesTable.draw();
      }
    });
  });
</script>
@endpush
