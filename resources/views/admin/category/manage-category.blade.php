@extends('admin.master')
@section('title')
    Manage Category
@endsection
@section('content')
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Manage category</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <!--BASIC-->
        <div class="col-sm-12 col-md-6">
            <h4 class="section-subtitle"><b>Manage Category</b> Table</h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('new-category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-md text-success">{{session('message')}}</h5>
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Publication Status</label>&nbsp; 	&nbsp;&nbsp; 	&nbsp;
                                    <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                    <input type="radio" name="publication_status" value="0"> UnPublished<br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--HORIZONTAL-->
        <div class="col-sm-12 col-md-6">
            <h4 class="section-subtitle"><b>Manage Sub Category</b> Table</h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('new-sub-category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-md text-success">{{session('messageSubCategory')}}</h5>
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select class="form-control" name="category_id" id="CategoryName" required>
                                        <option value="">---Select Category---</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Category Name</label>
                                    <input type="text" name="sub_category_name" class="form-control" id="" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Publication Status</label>&nbsp; 	&nbsp;&nbsp; 	&nbsp;
                                    <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                    <input type="radio" name="publication_status" value="0"> UnPublished<br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
