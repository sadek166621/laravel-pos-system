@extends('admin.master')
@section('title')
Manage-suppliers
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">suppliers</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4 class="text-center" style="color: green">{{Session::get('message')}}</h4>
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Shop</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($suppliers as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->name}}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td> {{ $row->address }}</td>
                                    <td>
                                    <img src="{{ asset($row->photo) }}" width="50px" height="50px">
                                    </td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->shop }}</td>
                                    <td>{{ $row->city }}</td>
                                    <td class="center">
                                    <a href="{{ url('/edit-suppliers/'.$row->id) }}" class="btn btn-primary btn-xs" title="Edit suppliers">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                    <a href="{{ url('/delete-suppliers/'.$row->id) }}" class="btn btn-danger btn-xs" id="deletedata" title="Edit suppliers">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
