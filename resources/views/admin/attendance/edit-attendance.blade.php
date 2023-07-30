@extends('admin.master')
@section('title')
Add-Attendance
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Attendance</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <div class="panel" style="
            border: 2px solid #1FBE9D;
        ">
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
                        <table class="table table-striped table-bordered nowrap table-hover" cellspacing="0" width="100%">
                            <h2 class="mb-xlg text-center" style="background-color: #1FBE9D ; font-weight: bold;"> Edit Attendance

                            </h2>
                            <h3 class="mb-xlg text-center" style=" font-weight: bold;">Date:{{ date('d/m/Y') }}</h3>

                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Attendace</th>
                            </tr>
                            </thead>
                            <tbody>

                        <form action="{{ route('update-attendace')}}" method="POST">
                            @csrf

                            <?php $i = 1; ?>
                            @foreach($attendace as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->name}}</td>
                                    <td>
                                    <img src="{{ asset($row->photo) }}" width="50px" height="50px">
                                    </td>
                                    <input type="hidden" name="id" value="{{ $row->id }}" >
                                    <td>
                                        <input type="radio" name="attendance" <?php if($row->attendance=='present'){
                                            echo "Checked";
                                        } ?> required value="present"> Present
                                        <input type="radio" name="attendance"<?php if($row->attendance=='absence'){
                                            echo "Checked";
                                        } ?> required value="absence"> Absence
                                    </td>

                                    <input type="hidden" name="date" value="{{ date('d/m/Y') }}">
                                    <input type="hidden" name="year" value="{{ date('Y') }}">
                                    <input type="hidden" name="month" value="{{ date('F') }}">

                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Update Attendance</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
