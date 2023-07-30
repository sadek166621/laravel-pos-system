@extends('admin.master')
@section('title')
Manage-Employeers
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Employeers</a></li>
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
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($employeers as $employeer)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $employeer->name}}</td>
                                    <td>{{ $employeer->phone }}</td>
                                    <td> {{ $employeer->address }}</td>
                                    <td>
                                    <img src="{{ asset($employeer->photo) }}" width="50px" height="50px">
                                    </td>
                                    <td>{{ $employeer->salary }}</td>
                                    <td class="center">
                                    <a href="{{ url('/edit-employeer/'.$employeer->id) }}" class="btn btn-primary btn-xs" title="Edit employeer">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    <a href="{{ url('/view-employeer/'.$employeer->id) }}" class="btn btn-default btn-xs" title="Edit employeer">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>

                                    <a href="{{ url('/delete-employeer/'.$employeer->id) }}" class="btn btn-danger btn-xs" id="deletedata" title="Edit employeer">
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
