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
        
                                        <div class="col-md-2 old_customer">
                                            <label for="basic-default-name">Booking Type</label>
                                                <select name="booking_type" id="booking_type" class="form-control">
                                                    <option value="">-- Booking Type  --</option>
                                                    <option value="MARRIAGE_BOOKING" {{ isset($_GET['booking_type']) && $_GET['booking_type'] == 'MARRIAGE_BOOKING' ? 'selected' : '' }}>MARRIAGE BOOKING</option>
                                                    <option value="OTHER_PARTY_BOOKING" {{ isset($_GET['booking_type']) && $_GET['booking_type'] == 'OTHER_PARTY_BOOKING' ? 'selected' : '' }}>OTHER PARTY BOOKING</option>
                                                    <option value="OTHERS" {{ isset($_GET['booking_type']) && $_GET['booking_type'] == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
                                                  
                                                </select>
                                        </div>
                                        <div class="col-md-3 old_customer">
                                            <label for="basic-default-name">Customer</label>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="">-- Select Customer --</option>
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}" {{ isset($_GET['customer_id']) && $_GET['customer_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-3">
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
                                        <th>Customer</th>
                                        <th>Room Type</th>
                                        <th>Room</th>
                                        <th>Price</th>
                                        <th>Check In </th>
                                        <th>Check Out</th>
                                        <th>Payment Status</th>
                                        <th>Payment Mode</th>
                                        <th>Due amount</th>
                                        {{-- <th>Added By</th> --}}
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                          
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->type }}</td>
                                            <td>{{ $booking->room_name }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->checkin_date }}</td>
                                            <td>{{ $booking->checkout_date }}</td>
                                            <td>{{ $booking->payment_type }}</td>
                                            <td>{{ $booking->payment_mode }}</td>
                                            <td>{{ $booking->due_amount }}</td>
                                            {{-- <td>{{ $booking->created_by }}</td> --}}
                                            <td>{{ $booking->created_at }}</td>
                                            <td>{{ $booking->updated_at }}</td>
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