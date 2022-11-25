@extends('layouts.backend.tablelayouts')
@push('css')
    <style>
        .photo{
            width: 100px;
            height:100px;
        }
    </style>
@endpush
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
                                <div class="w-100 d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Trashed list</h3>
                                       <div class=" d-flex">
                                    
                                        <form  action="{{ route('product.multiple.restore') }}" method="POST" id="restoreform">
                                            @csrf
                                            <button  id="multipleRestore" type="submit" class=" btn btn-info btn-sm d-none mr-1">
                                            <i class="fa fa-trash-restore"></i>
                                                Multiple Restore
                                        </button>
                                            <input type="hidden" name="id" value="" id="restoreItemId"/>
                                        </form>
                                       <button id="multipleDelete" onclick="Delete()" type="button" class=" btn btn-danger btn-sm d-none">
                                            <i class="fa fa-trash"></i>
                                                Multiple Delete
                                        </button>
                                        <form id="delete_form" action="{{ route('product.multiple.forcedelete') }}"method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="" id="itemId"/>
                                        </form>
                                     </div>

                                </div>

                             

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="productTrashedTable" class="table table-borderless table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Deleted Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                   {{-- <tbody>
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
                                     
                                                <a href="{{route('product.restore',$d->id)}}" class="btn btn-info btn-sm " title="Restore product">
                                                <i class="fas fa-trash-restore"></i>
                                                   Restore
                                                </a>
                                                <button onclick="Delete()" type="button" class=" btn btn-danger btn-sm ">
                                                    <i class="fa fa-trash"></i>
                                                     Delete
                                                </button>
                                                <form id="delete_form" action="{{ route('product.forcedelete') }}"method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$d->id}}"/>
                                                </form>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody> --}}
                                   
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
<script src="{{url('backend/plugins/sweetalert2/sweetalert2.all.js')}}"></script>

<script>
    let data = new Array();
    localData = localStorage.setItem("localData", JSON.stringify(data));
    function checkbox(e) {
       
            if ($(e).is(':checked')) {

                $("#multipleDelete").removeClass('d-none');
                $('#multipleRestore').removeClass('d-none');
                data.push(e.value);

                $("#itemId").val(data);
                $("#restoreItemId").val(data);
                localData = localStorage.setItem("localData", JSON.stringify(data));
               
            } else {
              
                const index = data.indexOf(e.value);
                if (index > -1) {
                    data.splice(index, 1);
                }
                if (data.length === 0) {
                    $("#multipleDelete").addClass('d-none');
                    $('#multipleRestore').addClass('d-none');

                }
                $("#itemId").val(data);
                $("#restoreItemId").val(data);


                localData = localStorage.removeItem("localData", JSON.stringify(data));
            
            }
    }

    $(document).ready(function() {
        $('#productTrashedTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('trash.lists.datatable') }}",
             
            },
            columns: [
                {
                    data: 'checkbox',
                    render: function (data, type) {
                        let localRetri = JSON.parse(window.localStorage.getItem("localData")) || [];
                        return (localRetri.length == 0) ? `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}">`
                            : (localRetri.find(element => element == data) == data)
                                ? `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}" checked>`
                                : `<input type="checkbox" value="${data}" onclick='checkbox(this)' id="1_${data}">`
                    }
                },
                {
                    data: 'name'
                   
                },
                {

                    data: 'image',
                    render: function (data, type) {
                        const image = `<img src= "{{ url ('${data}')}}" class="photo"/>`;
                        return image;
                    }
                },
                {
                    data: 'price',

                },
                {data: 'created_at'},
                {
                    data: 'action',
                    render: function (data, type) {
                        var restore = `<a href="{{route('product.restore',':id')}}" class="btn btn-info btn-sm mr-1" title="Restore product">
                                                <i class="fas fa-trash-restore"></i>
                                                   Restore
                                                </a>`;
                        restore = restore.replace(':id', data);
                        var del = `<button onclick="Delete()" type="button" class=" btn btn-danger btn-sm ">
                                <i class="fa fa-trash"></i>
                                    Delete
                            </button>
                            <form id="delete_form" action="{{ route('product.forcedelete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value=":id"/>
                            </form>
                        `;
                        del = del.replace(':id', data);
                        return restore + del;

                    }
                },
                {data: 'created_at'},
                

            ],

            responsive: true,
            lengthChange: true,
            autoWidth: false,
            paging: true,
            // dom: 'Blfrtip',
            // buttons: ["copy", "csv", "excel", "pdf", "print"],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: 2},
                {responsivePriority: 3, targets: 3},
                {responsivePriority: 4, targets: 4},
                {
                    'targets': [0, 2, 3,4],
                    'orderable': false,
                },
           
                {

                    'targets': [6],
                    'visible': false,
                    'searchable': false,
                }
            ],
            language: {
                "search": '<i class="fa-solid fa-search"></i>',
                "searchPlaceholder": 'Search...',
                paginate: {
                    next: '<i class="fa fa-angle-right"></i>', // or '→'
                    previous: '<i class="fa fa-angle-left"></i>' // or '←'
                }
            },


            "order": [[6, "desc"]],

        });

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

    if (window.performance) {
           $($( "*:checkbox" )).prop( "checked", false );
           localData = localStorage.removeItem("localData", JSON.stringify(data));
    }
</script>
    
@endpush
