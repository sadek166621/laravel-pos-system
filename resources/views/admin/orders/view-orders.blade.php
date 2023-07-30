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

                                                <div class="col-lg-4 col-sm-4">
                                                    <h4 style="font-weight: bold;">INVOICE INFO</h4>
                                                    <ul class="unstyled">
                                                        <li> Date			    : {{ date('d/m/y') }}</li>
                                                        <li>Invoice Number		: <strong> {{$customer->invoice_no }}

                                                       </strong></li>
                                                        <li style="font-weight: bold">Invoice Date		: {{$customer->order_date }}</li>

                                                        <li>Payment Type		: {{$customer->payment_status }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-hover">
                                                <thead style="background-color: #1FBE9D; font-weight: bolder;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th class="">Product Name</th>
                                                    <th class="">Qty</th>
                                                    <th class="">Unicost</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php $i = 1;  ?>
                                                     @foreach ($data as $raw)
                                                     <tr>
                                                        <td>{{$i}}</td>
                                                        <td>
                                                            <img src="{{ asset($raw->main_image) }}" alt="image" height="50"weight="50">
                                                        </td>
                                                        <td class="">{{ $raw->product_name }}</td>
                                                        <td class="">{{ $raw->quantity }}</td>
                                                        <td class="">{{ $raw->unicost }}</td>
                                                        <td class="">{{ $raw->total }}</td>
                                                    </tr>
                                                     <?php $i++; ?>

                                                     @endforeach


                                                </tbody>
                                            </table>
                                            <div class="row justify-content-end">
                                                <div class="col-lg-4 invoice-block " style="
                                                background-color: whitesmoke;
                                            ">
                                                    <ul class="unstyled amounts">
                                                        <li><strong>Sub - Total amount :</strong>{{ $order->sub_total }}</li>
                                                        @if ($order->due > 0)
                                                        <li style="font-weight:bold;"><strong style="color:red;">Due :</strong>{{ $order->due}} </li>
                                                        @endif
                                                        <li style="font-size: initial;"><strong>Grand Total :</strong>{{ $order->total}}</li>

                                                    </ul>
                                                </div>
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

@endsection
