@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Import Products</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel" style="
            border: 2px solid #1FBE9D;">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <h3 class="text-center" style='background-color:#1FBE9D;font-size:x-large;color:white'>Products Import</h3>
                            <a href="{{ route('export') }}" class="pull-right btn btn-danger btn-sm"> Download Xlsx</a>
                            <br>
                            <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Xlsx Import File</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="main_image" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
