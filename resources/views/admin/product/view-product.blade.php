@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Product</a></li>
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
                                    <h2>View Products Information</h2>
                                    <h2>{{ session('message') }}</h2>
                                </div>
                                <div class="body">
                                    <table class="table table-bordered table-dark table-hover" >
                                        <tr>
                                            <th class="text-danger">Category Name :</th>
                                            <td class="text-success">{{ $productById->cat_name}}</td>
                                            <th class="text-danger">Suppliers Name :</th>
                                            <td class="text-success">{{ $productById->name}}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-danger">Product Name :</th>
                                            <td class="text-success">{{ $productById->product_name}}</td>
                                            <th class="text-danger">Product Code :</th>
                                            <td class="text-success">{{ $productById->product_code}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <th class="text-danger">Category Name :</th>--}}
{{--                                            <td class="text-success">{{ $productById->category_name}}</td>--}}
{{--                                            <th class="text-danger">Sub Category Name :</th>--}}
{{--                                            <td class="text-success">{{ $productById->sub_category_name}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th class="text-danger">Brand Name:</th>--}}
{{--                                            <td class="text-success">{{ $productById->brand_name}}</td>--}}
{{--                                            <th class="text-danger">Supplier Name :</th>--}}
{{--                                            <td class="text-success">{{ $productById->supplier_name}}</td>--}}
{{--                                        </tr>--}}

                                        <tr>

                                            <th class="text-danger">Product Image:</th>
                                            <td><img src="{{ asset($productById->main_image) }}" alt="" height="80" width="80"/></td>
                                            <th class="text-danger">Product Cost:</th>
                                            <td class="text-success">{{ $productById->product_cost}}</td>

                                        </tr>
                                        <tr>
                                            <th class="text-danger">Product Description:</th>
                                            <td class="text-success">{{ $productById->description}}</td>
                                            <th class="text-danger">Product Price:</th>
                                            <td class="text-success" style="background-color: green; color:aliceblue;">{{ $productById->product_price}}</td>

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
