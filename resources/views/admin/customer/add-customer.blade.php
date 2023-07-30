@extends('Admin.master')
@section('title')
Add Customers
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Add Customers</a></li>
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
                        <form class="form-horizontal form-stripe" action="{{route('incert-customer')}}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <h6 class="mb-xlg text-center"> <b style='background-color:#1FBE9D;font-size:x-large;'> Add Customers</b></h6>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name <span style="color:red;">*</span> </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Phone<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control"  name="phone" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Address<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Photo<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  name="photo" placeholder="Enter photo">
                                    <img id="blah" alt=" image" width="50" height="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">NID</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control"  name="nid" placeholder="Enter nid number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="city" placeholder="Enter city">
                                </div>
                            </div>

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
