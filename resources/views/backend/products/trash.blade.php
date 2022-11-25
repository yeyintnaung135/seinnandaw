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
                                    <button id="multipleDelete" onclick="Delete()" type="button" class=" btn btn-danger btn-sm d-none">
                                            <i class="fa fa-trash"></i>
                                                Delete
                                        </button>
                                        <form id="delete_form" action="{{ route('product.multiple.trash') }}"method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="" id="itemId"/>
                                        </form>
                                  
                                       <div class="">
                                       <a href="{{url('backend/products/list')}}" class="text-dark" title="Product lists"><i class="fas fa-list"></i></a>
                                       
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
                                        <th>Create Date</th>
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
       
                {
                    data: 'action',
                    render: function (data, type) {
                        
                        var info = `<a style="margin-right: 5px;" class="btn btn-sm btn-success" href="{{url('product/detail/'.':id')}}"><span class="fa fa-info-circle"></span></a>`;
                        info = info.replace(':id', data);
                        var edit = `<a class="btn btn-sm btn-primary" href=""><span class="fa fa-edit"></span></a>`;
                        edit = edit.replace(':id', data);
                        return info;

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

                    'targets': [5],
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


            "order": [[5, "desc"]],

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
