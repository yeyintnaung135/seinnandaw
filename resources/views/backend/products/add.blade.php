@extends('layouts.backend.layout')
@section('title','Sein Nan Daw | Product Create')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-minibackheader :maintext="'Add new products'" :subtext="'add new products'"/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">New Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{url('backend/products/add')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row no-gutters">
                                        <div class="col-12 col-md-6 pr-0 pr-md-2">
                                            <label for="exampleInputEmail1">Name
                                                @error('name')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>
                                            <input type="text" name="name"
                                                   class="form-control  @error('name') is-invalid @enderror "
                                                   id="exampleInputEmail1" value="{{old('name')}}"
                                                   placeholder="Enter Name" required
                                            >


                                        </div>
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="col-12 col-md-6">
                                            <label for="customFile">Default Photo
                                                @error('photo')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>

                                            <div class="custom-file">

                                                <input type="file" name="photo" class="custom-file-input"
                                                       id="customFile" required>
                                                <label class="custom-file-label" for="customFile">Default Photo</label>
                                                @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <div class="col-12 col-md-6 pr-0 pr-md-2">
                                            <label for="customFile"> Photo One
                                                @error('photo_one')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>

                                            <div class="custom-file">

                                                <input type="file" name="photo_one" class="custom-file-input"
                                                       id="customFile" >
                                                <label class="custom-file-label" for="customFile">Photo One</label>
                                                @error('photo_one')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="col-12 col-md-6">
                                            <label for="customFile"> Photo Two
                                                @error('photo_two')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>

                                            <div class="custom-file">

                                                <input type="file" name="photo_two" class="custom-file-input"
                                                       id="customFile" >
                                                <label class="custom-file-label" for="customFile">Photo Two</label>
                                                @error('photo_two')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <div class="col-12 col-md-6 pr-0 pr-md-2">
                                            <label for="customFile"> Photo Three
                                                @error('photo_three')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>

                                            <div class="custom-file">

                                                <input type="file" name="photo_three" class="custom-file-input"
                                                       id="customFile" >
                                                <label class="custom-file-label" for="customFile">Photo One</label>
                                                @error('photo_three')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="col-12 col-md-6">
                                            <label for="customFile"> Photo Four
                                                @error('photo_four')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>

                                            <div class="custom-file">

                                                <input type="file" name="photo_four" class="custom-file-input"
                                                       id="customFile" >
                                                <label class="custom-file-label" for="customFile">Photo Four</label>
                                                @error('photo_four')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <div class="col-12 col-md-6 pr-md-2">
                                            <label for="exampleInputEmail1">Price (Ks)
                                                @error('price')

                                                <span
                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                @enderror
                                            </label>
                                            <input type="number" name="price"
                                                   class="form-control  @error('price') is-invalid @enderror "
                                                   id="exampleInputEmail1" value="{{old('price')}}"
                                                   placeholder="Enter Price" required
                                            >


                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach($catlist as $c)
                                                    @if((old('category_id') and old('category_id') == $c->id) or $c->name=='all' )

                                                        <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                                    @else
                                                        <option value="{{$c->id}}">{{$c->name}}</option>

                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <div class="col-12 col-md-4 pr-0 pr-md-2">
                                            <label>Subcategory</label>
                                            <select class="form-control" name="subcategory">
                                                <option value="GOLD" selected>GOLD</option>
                                                <option value="DIAMOND" >DIAMOND</option>
                                                <option value="WHITE GOLD" >WHITE GOLD</option>


                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 pr-0 pr-md-2">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Feature Product</label>
                                                <select class="form-control" name="feature" required>
                                                    @if(old('feature') and old('feature') == 'yes')
                                                        <option value="yes" selected>Yes</option>
                                                        <option value="no">No</option>

                                                    @else
                                                        <option value="yes" >Yes</option>
                                                        <option value="no" selected>No</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>New Arrivals</label>
                                                <select class="form-control" name="new_arrival" required>
                                                    @if(old('new_arrivals') and old('new_arrivals') == 'yes')
                                                        <option value="yes" selected>Yes</option>
                                                        <option value="no">No</option>

                                                    @else
                                                        <option value="yes" >Yes</option>
                                                        <option value="no" selected>No</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <section class="content">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="card card-outline card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                Short Description
                                                                @error('short_desc')

                                                                <span
                                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                                @enderror

                                                            </h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                         <textarea id="summernote1" name="short_desc" >
                                                         {{old('short_desc')}}</textarea>

                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.col-->
                                            </div>
                                            <!-- ./row -->
                                            <!-- ./row -->
                                        </section>
                                    </div>

                                    <div class="form-group">

                                        <section class="content">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="card card-outline card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                Description
                                                                @error('description')

                                                                <span
                                                                    style="color:red;font-size:13px;font-weight:bold;">{{ $message }}</span>

                                                                @enderror

                                                            </h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                         <textarea id="summernote" name="description" >
                                                         {{old('description')}}</textarea>

                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.col-->
                                            </div>
                                            <!-- ./row -->
                                            <!-- ./row -->
                                        </section>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('scripts')
    <script src="{{url('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote({
                height: 300,

                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],

                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']],


                ]

            });
            $('#summernote1').summernote({
                height: 300,

                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],

                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']],


                ]

            })

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    <script>

        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
