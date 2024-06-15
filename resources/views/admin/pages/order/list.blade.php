@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="" class="browser-default-validation">
        <div class="row">
           
            <div class="col-md-12">
                <div class="card">
                    {{-- <h5 class="card-header">Publish</h5> --}}
                    <div class="card-body">
                        <div class="float-right my-2 text-right" style="text-align: right">
                            <a href="{{URL::to('admin/order/add-order')}}"><button type="button" class="btn btn-warning">Add order</button></a>
                         
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Date</th>
                                        <th>Bottle</th>
                                        <th>Bottle Price</th>
                                        <th>Bottle Quantity</th>
                                        <th>Bottle Total</th>
                                        <th>Thali</th>
                                        <th>Thali Price</th>
                                        <th>Thali Quantity</th>
                                        <th>Thali Total</th>
                                        <th>Sub Total</th>
                                        <th>Bottle Minus Price</th>
                                        <th>Grand Total</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/order/edit_order', $order->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/order/delete_order', $order->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                            <td>{{ $order->date }}</td>
                                            <td>{{ $order->bottle_name }}</td>
                                            <td>{{ $order->bottle_price }}</td>
                                            <td>{{ $order->bottle_quantity }}</td>
                                            <td>{{ $order->bottle_total }}</td>
                                            <td>{{ $order->thali_name }}</td>
                                            <td>{{ $order->thali_price }}</td>
                                            <td>{{ $order->thali_quantity }}</td>
                                            <td>{{ $order->thali_total }}</td>
                                            <td>{{ $order->sub_total }}</td>
                                            <td>{{ $order->bottle_minus_price }}</td>
                                            <td>{{ $order->grand_total }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
 
            </div>
            
        </div>
    </form>
</div>

@endsection