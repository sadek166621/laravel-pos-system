@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Products</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
{{--            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>--}}
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <h4 class="text-center" style="color: green">{{Session::get('message')}}</h4>
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <!--<th>Sub Category Name</th>-->
                                <th>Product cost</th>
                                <th>Product Price</th>
                                <th>Stock Amount</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($allPublishedProducts as $allPublishedProduct)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $allPublishedProduct->product_name }}</td>
                                    <td>{{ $allPublishedProduct->cat_name }}</td>

                                    <td>TK. {{ $allPublishedProduct->product_cost }}</td>
                                    <td>TK. {{ $allPublishedProduct->product_price }}</td>
                                    <td>
                                        @if ( $allPublishedProduct->product_stock < 2)
                                        <span style="  font-size:120%;color: red">{{ $allPublishedProduct->product_stock }}</span>
                                        @else
                                        {{ $allPublishedProduct->product_stock }}
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($allPublishedProduct->main_image) }}" alt="image" height="50px" width="50px">
                                    </td>
                                    <td class="center">
                                        <a href="{{ url('/view-product/'.$allPublishedProduct->id) }}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-eye-open" title="View Product"></span>
                                        </a>
                                        <a href="{{ url('/edit-product/'.$allPublishedProduct->id) }}" class="btn btn-primary btn-xs" title="Edit Product">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ url('/delete-product/'.$allPublishedProduct->id) }}" class="btn btn-danger btn-xs" title="Delete Product" id="deletedata">
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
