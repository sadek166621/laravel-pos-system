@extends('admin.master')
@section('title')
Month-Expense
@endsection
@section('content')
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Month-Expense</a></li>
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
                        $month = date('F');
                        $total = DB::table('expenses')->where('month',$month)->sum('amount');
                        @endphp

                        <h3 class="panel-title" style=" background-color: #1FBE9D; font-weight: bold; font-size:x-large; text-align: center">
                            Month Expenses ( {{date('F')}} {{ date('Y') }} )
                        </h3>

                        <h5 class="text-center">
                            <a href="{{ route('jan-expense') }}" class="btn btn-primary">Jan</a>
                            <a href="{{ route('feb-expense') }}"class="btn btn-danger">Feb</a>
                            <a href="{{ route('mar-expense') }}"class="btn btn-success">Mar</a>
                            <a href="{{ route('apl-expense') }}"class="btn btn-secondary">Apl</a>
                            <a href="{{ route('may-expense') }}"class="btn btn-warning">May</a>
                            <a href="{{ route('jun-expense') }}"class="btn btn-info">Jun</a>
                            <a href="{{ route('july-expense') }}"class="btn btn-light">July</a>
                            <a href="{{ route('aug-expense') }}"class="btn btn-danger">Aug</a>
                            <a href="{{ route('sep-expense') }}"class="btn btn-primary">Sep</a>
                            <a href="{{ route('oct-expense') }}"class="btn btn-success">Oct</a>
                            <a href="{{ route('nov-expense') }}"class="btn btn-danger">Nov</a>
                            <a href="{{ route('dec-expense') }}"class="btn btn-warning">Dec</a>
                        </h5>
                        {{-- <h4 class="text-center" style=" color:darkred;font-weight: bold;">Total: {{ $total }}৳</h4> --}}
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Details</th>
                                <th>Date</th>
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
                                    <td>{{ $expense->date}}</td>

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
