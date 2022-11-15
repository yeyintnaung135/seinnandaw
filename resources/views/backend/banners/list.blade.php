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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Create Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)

                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td><img style="width:200px;height:100px;" src="{{url($d->photo)}}"></td>


                                            <td>
                                                {{date('F d, Y ( h:i A )', strtotime($d->created_at))}}
                                            </td>
                                            <td class="">
                                                <a href="{{url('backend/banners/detail/'.$d->id)}}" role="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Shop Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{url('backend/banners/edit/'.$d->id)}}" role="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Shop Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" onclick="deleteShop(this)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Move To Trash">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form action="{{url('/backend/banners/delete')}}" id="deleteform" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$d->id}}">


                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
    function deleteShop(e){
    if (window.confirm("Are you sure to delete?")) {
    $('#deleteform').submit();
    }
    }
    </script>
@endpush
