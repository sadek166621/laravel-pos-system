@extends('admin.master')
@section('title')
    Sub Category
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Sub Category</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>
            <div class="panel">
                <div class="panel-content">
                    <form name="editSubCategoryForm" action="{{ route('update-sub-category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sub_category_id" value="{{ $subCategory->id }}" >
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
                            <input type="text" name="sub_category_name" value="{{ $subCategory->sub_category_name }}" class="form-control" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Publication Status</label>&nbsp; 	&nbsp;&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="1"> Published  	&nbsp; 	&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="0"> UnPublished<br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editSubCategoryForm'].elements['publication_status'].value='{{$subCategory->publication_status}}'
        document.forms['editSubCategoryForm'].elements['category_id'].value='{{$subCategory->category_id}}'
    </script>
@endsection
