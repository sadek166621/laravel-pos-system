@extends('admin.master')
@section('title')
Today-Expense
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Today-Expense</a></li>
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
                        @php
                        $date = \Carbon\Carbon::now()->format('d.m.Y');
                        $total = DB::table('expenses')->where('date',$date)->sum('amount');
                        @endphp

                        <h3 class="panel-title" style=" background-color: #1FBE9D; font-weight: bold; font-size:x-large; text-align: center">
                            Today Expenses
                        </h3>
                        <h4 class="text-center" style=" color:darkred;font-weight: bold;">Total: {{ $total }}৳</h4>
                        <h4 class="text-left" style=" color:black;font-weight: bold;">Date: {{ date('d/m/Y') }}</h4><br>
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $expense->details}}</td>

                                    <td style="font-weight: bold;" > {{ $expense->amount }}</td>


                                    <td class="center">
                                    <a href="{{ url('/edit-expense/'.$expense->id) }}" class="btn btn-primary btn-xs" title="Edit expense">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>


                                    <a href="{{ url('/delete-expense/'.$expense->id) }}" class="btn btn-danger btn-xs" id="deletedata" title="delete expense">
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
