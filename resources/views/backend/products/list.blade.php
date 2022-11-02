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
                                <table id="example2" class="table table-bordered table-hover">
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
                                                <x-beautydate :date="'{{$d->created_at}}'"></x-beautydate>
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
