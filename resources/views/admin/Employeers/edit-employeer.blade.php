@extends('Admin.master')
@section('title')
Edit Employeers
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Edit Employeer</a></li>
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
                        <form class="form-horizontal form-stripe" action="{{route('update-employeer')}}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <h6 class="mb-xlg text-center"> <b> Add Employeers</b></h6>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$employeer->name}}" class="form-control" name="name" placeholder="Enter Name">
                                    <input type="hidden" value={{$employeer->id}} name="id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" value="{{$employeer->email}}" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$employeer->phone}}" name="phone" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$employeer->address}}" name="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Experience</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$employeer->experience}}"  name="experience" placeholder="Enter experience">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  name="photo" placeholder="Enter photo">
                                    <img src="{{ asset($employeer->photo) }}"  id="blah" alt="image" height="50" width="50"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Salary</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$employeer->salary}}" class="form-control"  name="salary" placeholder="Enter salary">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">Vacation</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$employeer->vacation}}" name="vacation" placeholder="Enter vacation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3" class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$employeer->city}}"  name="city" placeholder="Enter city">
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
