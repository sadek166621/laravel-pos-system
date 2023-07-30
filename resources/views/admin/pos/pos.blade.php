@extends('admin.master')
@section('content')
<style>
    * {
      box-sizing: border-box;
    }

    .columns {
      float: left;
      width: 100%;
      padding: 8px;
    }

    .price {
      list-style-type: none;
      border: 1px solid #eee;
      margin: 0;
      padding: 0;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }

    .price:hover {
      box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }

    .price .header {
      background-color: #111;
      color: white;
      font-size: 18px;
    }

    .price li {
      border-bottom: 1px solid #eee;
      text-align: center;
    }

    .price .grey {
      background-color: #eee;
      font-size: 20px;
    }

    .button {
      background-color: #04AA6D;
      border: none;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
    }

    @media only screen and (max-width: 600px) {
      .columns {
        width: 100%;
      }
    }
    </style>
<div class="content-header" style="top: 60px; background-color: #1FBE9D; !important">

    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
                <li>
                    <a style="color: black;font-weight: 900;">POS (Point Of Sale)</a>
                </li>
            </ul>

    </div>
    <div class="rightside-content-header">
        <ul class="breadcrumbs">
                <li>
                    <a style="color: black;font-weight: 900;">Date : {{ date('d/m/y') }}</a>
                </li>
            </ul>
    </div>
</div>
<div class="row">
<div class="col-lg-8">


            @foreach ( $categories as $categorie)
            <a href="{{ Url('/show-cat-pro/'.$categorie->id) }}" class="btn btn-wide btn-primary">{{$categorie->cat_name }}</a>
            @endforeach



    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php $i = 1; ?>
                    @foreach($allPublishedProducts as $allPublishedProduct)
                    @if ($allPublishedProduct->product_stock > 0)
                        <tr>
                            <form action="{{route('incert-cart')}}" method="post" id="add-to-cart-form">
                                @csrf
                            <input type="hidden" value="{{ $allPublishedProduct->id }}" name="Product_id">
                            <td>{{ $i }}</td>
                            <td>{{ $allPublishedProduct->cat_name }}</td>
                            <td>{{ $allPublishedProduct->product_name }}</td>
                            <td>TK. {{ $allPublishedProduct->product_price }}</td>

                                <td>
                                    <button type="submit" style="border: none" title="Add Cart">
                                    <img src="{{ asset($allPublishedProduct->main_image) }}" alt="image" height="50px" width="50px">
                                    </button>
                                </td>
                            </form>
                        </tr>
                        <?php $i++; ?>
                        @endif
                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-4">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style=" border: 3px solid #126F5C;">
                <div class="modal-body">
                    <form class="form-horizontal form-stripe" action="{{route('pos-customer')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <h6 class="mb-xlg text-center" style="background-color:#1FBE9D;"> <b style='font-size:x-large;'> Add Customers</b></h6>

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
                                <button type="submit" class="btn btn-primary">Add Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="row animated fadeInUp">
        <div class="col-lg-12">
            <div class="panel" style="
            border: 2px solid #1FBE9D;">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-lg-12">

                                        <div class="columns">
                                            <ul class="price">
                                              <li>
                                                <table  class="table table-striped table-bordered nowrap table-hover cart-show-value" width="100%">
                                                    <thead style="background-color:#04AA6D; color:white;font-weight: bold;">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Sub Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>


                                                        <tbody>
                                                            @foreach ( $cartItems as $product )
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>
                                                                    {{ $product->price }}
                                                             </td>
                                                             <td class="product-quantity">

                                                                <form action="{{ route('cart-update') }}" method="post" class="form-inline" id="cart-update-ajax-form">
                                                                    @csrf
                                                                   <button type="submit" style="border: none;">
                                                                    <input type="number" name="qty" value="{{ $product->qty }}" style="width: 32px">
                                                                    </button>
                                                                        <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                                                </form>
                                                            </td>
                                                                <td>{{$product->price*$product->qty }}</td>
                                                                <td>
                                                                 <a data-id="{{$product->rowId}}" href="#" class="btn btn-danger btn-xs remove-ajax-form-cart ">
                                                                     <span class="glyphicon glyphicon-trash"></span>
                                                                 </a></td>
                                                             </tr>
                                                            @endforeach
                                                            </tbody>


                                                </table>
                                              </li>
                                              <li class="header" style="background-color:#04AA6D">
                                           <div class="axjc">
                                            <p>
                                                Total Quantity : {{ Cart::count() }}
                                               </p>
                                               <p >
                                                Vat : {{Cart::tax()}}
                                               </p>
                                               <hr>
                                               <p style="font-size:25px;">
                                                Total : {{ Cart::subtotal() }} <span style="font-size: 10px;">(- vat)</span>
                                               </p>
                                           </div>

                                            </li>
                                            </ul>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="top: 50px; margin-top: 9px; ">
                                                Add New Customer
                                            </button>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                            <form action="{{ route('invoice') }}" method="post">
                                                @csrf
                                                        <select name="cus_id" class="form-control">
                                                            <option value="">--- Select Customer Name ---</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                            @endforeach
                                                        </select>
                                    </div>

                                    <div class="text-center ">
                                        <button class="btn btn-danger" style="
                                        border: 1px solid black;
                                    ">Create Invoice</button>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            {{-- </form> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






</div>
</div>

@endsection
