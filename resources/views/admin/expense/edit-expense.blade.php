@extends('Admin.master')
@section('title')
Edit Expense
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Edit Expense</a></li>
        </ol>
    </section>

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal form-stripe" action="{{route('update-expense')}}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <h6 class="mb-xlg text-center"> <b style="
                                font-size: x-large;
                                background-color: #1FBE9D;
                                ;
                            "> Edit Expense</b></h6>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Expense Details</label>
                                <div class="col-sm-10">
                                    <textarea name="details" id="" rows="4" style="width: 100%;">
                                        {{ $expense->details }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email3" class="col-sm-2 control-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $expense->amount }}" class="form-control" name="amount" placeholder="Enter Amount">
                                </div>
                            </div>
                                    <input type="hidden" class="form-control"  name="date" value="{{\Carbon\Carbon::now()->format('d.m.Y')}}">
                                    <input type="hidden" class="form-control"  name="month" value="{{ date('F') }}">
                                    <input type="hidden" class="form-control"  name="year" value="{{ date('Y') }}">
                                    <input type="hidden" class="form-control"  name="id" value="{{ $expense->id }}">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->


@endsection
