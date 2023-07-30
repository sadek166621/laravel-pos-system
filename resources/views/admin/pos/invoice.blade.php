@extends('admin.master')
@section('yield')
Invoice Pos
@endsection
@section('content')

<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Invoice</a></li>
            <li><a>Data-table</a></li>
        </ul>
    </div>
</div>

    <!-- invoice start-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <div class="panel" style="
            border: 1px solid #1FBE9D;
        ">
                <div class="panel-content">
                    <div class="table-responsive">

                        <table class="table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <section class="wrapper">
                                <section>
                                    <div class="card card-primary">
                                        <!--<div class="card-heading navyblue"> INVOICE</div>-->
                                        <div class="card-body">
                                            <div class="row invoice-list" style="
                                            background-color: whitesmoke;
                                        ">
                                        <br>
                                                <div class="col-md-12 text-center corporate-id">
                                                    <img alt="logo" style="height: 38px;background: lightcyan;" src="{{asset('AdminAssets')}}/images/logo-dark.png" />
                                                </div>
                                                <br><br> <br>
                                                <div class="col-lg-4 col-sm-4" >
                                                    <h4 style="font-weight: bold;">Shop ADDRESS</h4 >
                                                    <p>
                                                        Jonathan Smith <br>
                                                        44 Dreamland Tower, Suite 566 <br>
                                                        ABC, Dreamland 1230<br>
                                                        Tel: +12 (012) 345-67-89
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-sm-4">
                                                    <h4 style="font-weight: bold;">Customer ADDRESS</h4>
                                                    <p>
                                                        Name: {{ $customer->name }}<br>
                                                        Email: {{ $customer->email }}<br>
                                                        Address: {{ $customer->address }}<br>
                                                        Phone: {{ $customer->phone }}<br>
                                                    </p>
                                                </div>
                                                @php
                                                    $rand = rand(1000,9000);
                                                @endphp
                                                <div class="col-lg-4 col-sm-4">
                                                    <h4 style="font-weight: bold;">INVOICE INFO</h4>
                                                    <ul class="unstyled">
                                                        <li> Date			    : {{ date('d/m/y') }}</li>
                                                        <li>Invoice Number		: <strong>
                                                           {{ $rand }}
                                                       </strong></li>
                                                        <li>Invoice Date		: {{ date('d/m/y') }}</li>

                                                        <li>Invoice Status		: pending</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-hover">
                                                <thead style="background-color: #1FBE9D; font-weight: bolder;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th class="">Unit Cost</th>
                                                    <th class="">Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php $i = 1; $total = 0; ?>
                                                    @foreach ($cart as $data )


                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="">{{ $data->price }}</td>
                                                    <td class="">{{ $data->qty }}</td>
                                                    <td>{{ $subTotal = $data->price*$data->qty}}</td>
                                                </tr>
                                                 <?php $i++; $total = $total+$subTotal; ?>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <div class="row justify-content-end">
                                                <div class="col-lg-4 invoice-block " style="
                                                background-color: whitesmoke;
                                            ">
                                                    <ul class="unstyled amounts">
                                                        <li><strong>Sub - Total amount :</strong> {{ Cart::subtotal() }}</li>
                                                        <li><strong>VAT :</strong> -----</li>
                                                        <li style="font-size: initial;"><strong>Grand Total :</strong> {{ Cart::subtotal() }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text-center invoice-btn">
                                                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check"></i> Submit Invoice </a>
                                                <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style=" border: 2px solid #126F5C;">
                <h4 class="text-left font-weight-bold" style="background-color: #126F5C; color:white;padding-left: 12px;">Invoice Of {{ $customer->name }} <span style="padding-left: 310px;"> Total : {{ $total }}</span> </h4>

                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                <div class="modal-body">
                    <form action="{{ route('final-invoice') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" >Payment Type</label>
                                        <select required name="payment_status" class="form-control">
                                            <option value="">--- Select Option ---</option>

                                                <option value="cash">Cash</option>
                                                <option value="bkash">Bkash</option>
                                                <option value="nogad">Nogad</option>
                                                <option value="rocket">roket</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" >Pay</label>
                                        <input type="hidden" value="{{ $total }}" id="price">

                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                        <input type="hidden" name="order_date" value="{{ date('d/m/y')}}">
                                        <input type="hidden" name="order_status" value="pending">
                                        <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                        <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                        <input type="hidden" name="vat" value="0">
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <input type="hidden" name="invoice_no" value="{{ $rand }}">


                                        <input type="text" onkeyup="discount_price();" class="form-control" name="pay" id="product_discount_amount" placeholder="" required>

                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" >Due</label>
                                        <input readonly type="text" class="form-control" name="due" id="product_discount_price" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
