@extends('admin.master')
@section('title')
Manage-Attendances
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Attendances</a></li>
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
                            <h2 class="mb-xlg text-center" style="background-color: #1FBE9D ; font-weight: bold;">View Attendances </h2>

                            <span style="font-weight:bold">
                                Name : {{ $data->name}}
                                <br>
                                Image :<img src="{{ asset($data->photo) }}" width="50px" height="50px">

                            </span>

                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Attendance</th>
                                <th>Month</th>
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($Attendances as $attendance)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> {{ $attendance->date }}</td>
                                    @if ($attendance->attendance == 'absence')
                                    <td style="color:red ">Absence</td>
                                    @else
                                    <td >Present</td>
                                    @endif
                                    <td> {{ $attendance->month }}</td>
                                    <td> {{ $attendance->year }}</td>

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
