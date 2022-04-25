@extends('admin.layouts.app')

@section('title', 'Orders')

@section('breadcrumb', 'Order list')

@section('content')

<section id="configuration">
    <div class="row mt-1    ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order List</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="min">Sl No.</th>
                                    <th>Order date</th>
                                    <th>Customer Id</th>
                                    <th>Item Id</th>
                                    <th>Item Quantity</th>
                                    <th>Amount</th>
                                    <th>OrderStatus</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($orders) )
                                    @foreach ( $orders as $order )
                                        <tr>
                                            {{-- <td>{{ $n++ }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td> {{ $order->customer->name }} </td>
                                            <td> {{ $order->product->item_quantity }} </td>
                                            <td> {{ $order->product->grand_total }} </td> --}}
                                            <td> 2000 tk </td>
                                            <td> <button type="button" class="btn  btn-warning btn-sm">Pending </button> </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#seoEdit" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Order date</th>
                                    <th>Customer Id</th>
                                    <th>Item Id</th>
                                    <th>Item Quantity</th>
                                    <th>Amount</th>
                                    <th>OrderStatus</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

