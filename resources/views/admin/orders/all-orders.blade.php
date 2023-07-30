@extends('admin.master')
@section('title')
Manage-Customer
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Orders</a></li>
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
                                <th>Invoice No</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>P Y</th>
                                <th>Total</th>
                                <th>Pay</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $row)
                                <tr>
                                    <td style="font-weight: bold">{{ $row->invoice_no }}</td>
                                    <td style="text-transform: capitalize">{{ $row->name}}</td>
                                    <td>{{ $row->order_date }}</td>
                                    <td> {{ $row->payment_status }}</td>
                                    <td> {{ $row->total }}</td>
                                    <td>{{ $row->pay }}</td>
                                    <td>{{ $row->due }}</td>
                                    <td class="center">
                                    <a href="{{ url('/view-order/'.$row->id) }}" class="btn btn-success btn-xs" title="View Order">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
