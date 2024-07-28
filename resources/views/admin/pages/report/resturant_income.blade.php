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
                        <div class="row my-4">
                           
                            <div class="col-md-12 text-center">
                                <h4 class="">Search</h4>
                                <form action="{{URL::to('admin/report/cash_received')}}" method="get">
                                   
                                    <div class="row search-box">
        
                                        <div class="col-md-4 old_customer">
                                            <label for="basic-default-name">Customer</label>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="">-- Select Customer --</option>
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}" {{ isset($_GET['customer_id']) && $_GET['customer_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Start Date</label>
                                                <input type="date" class="form-control"   name="start_date" value="<?php echo isset($start_date)?date('Y-m-d',strtotime($start_date)):''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">End Date</label>
                                                <input type="date" class="form-control"  name="end_date" value="<?php echo isset($end_date)?date('Y-m-d',strtotime($end_date)):''; ?>" >
                                            </div>
                                        </div>
        
                                        <div class="col-md-2">
                                            <div class="form-group bmd-form-group" style="margin-top: 21px;"> 
                                                <button type="submit" class="btn btn-success pull-right pull-rights"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="clearfix"></div>
        
                                </form> 
                            </div>
        
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Room Number</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                           
                                            <td>{{ $order->date }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->room_no}}</td>
                                            <td>{{ $order->product_name}}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->sub_total }}</td>
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