@extends('layouts.backend.tablelayouts')
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
                                <div class="col-6 col-md-8">
                                    <h3 class="card-title">Categories list</h3>

                                </div>

                                <div class="col-6 col-md-4" style="width:122px;">
                                    <a type="button" href="{{url('backend/categories/add')}}"
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
                                        <th>Create Date</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)

                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>


                                            <td>
                                                <x-beautydate :date="'{{$d->created_at}}'"></x-beautydate>
                                            </td>
                                            <td>
                                                <a href="{{url('backend/categories/detail/'.$d->id)}}" type="button" style=" width: 81px;" class="btn btn-primary btn-sm btn-block">
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
