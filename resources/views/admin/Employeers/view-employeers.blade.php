@extends('admin.master')
@section('title')
View-Employeer
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">View-Employeer</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="header text-center">
                                    <br>
                                    <h2>View Employeer Information</h2>
                                    <h2>{{ session('message') }}</h2>
                                </div>
                                <div class="body">
                                    <table class="table table-bordered table-dark table-hover" >
                                        <tr>
                                            <th class="text-danger"> Name :</th>
                                            <td class="text-default">{{ $employeer->name}}</td>
                                            <th class="text-danger">Email :</th>
                                            <td class="text-default">{{ $employeer->email}}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-danger"> Phone :</th>
                                            <td class="text-default">{{ $employeer->phone}}</td>
                                            <th class="text-danger">Address :</th>
                                            <td class="text-default">{{ $employeer->address}}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-danger"> Experience :</th>
                                            <td class="text-default">{{ $employeer->experience}}</td>
                                            <th class="text-danger">Photo :</th>
                                            <td class="text-default">
                                                <img src="{{asset($employeer->photo)}}" alt="img" style="height:50px; width:50px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-danger"> Salary :</th>
                                            <td class="text-default" style='background-color: green; color:white'>{{ $employeer->salary}}</td>
                                            <th class="text-danger">vacation :</th>
                                            <td class="text-default">{{ $employeer->vacation}}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-danger"> City :</th>
                                            <td class="text-default">{{ $employeer->city}}</td>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
