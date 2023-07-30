@extends('admin.master')
@section('title')
     Category
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Category</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Category
    </button>

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            {{-- <h5 class="mb-md text-success text-center">{{session('message')}}</h5> --}}
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>
                            @foreach($categories as $category)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$category->cat_name}}</td>
                                    <td>

                                        <a title='Edit' class="btn btn-primary btn-xs update-form-category" data-toggle="modal" data-target="#exampleModalCenter"
                                        data-id="{{ $category->id }}"
                                        data-cat_name="{{ $category->cat_name }}"

                                        >
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger btn-xs" id="deletedata" title="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>

                                </tr>
                                <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" border: 2px solid #126F5C;">
                <h4 class="text-center font-weight-bold" style="background-color: #126F5C; color:white">Add Category form</h4>

                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                <div class="modal-body">
                    <form action="{{ route('new-category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-md text-success">{{session('message')}}</h5>
                        <div class="form-group">
                            <label for="" >Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- -----------------edit modal view -------------- --}}




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style=" border: 2px solid #126F5C;">
            <h4 class="text-center font-weight-bold" style="background-color: #126F5C; color:white">Edit Category form</h4>

            {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
            <div class="modal-body">
                <form action="{{ route('update-category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-md text-success">{{session('message')}}</h5>
                    <input type="hidden" name="id" id="cat_id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="" >Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="cat_name" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection


