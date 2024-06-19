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
                            <a href="{{URL::to('admin/booking/add-booking')}}"><button type="button" class="btn btn-warning">Add booking</button></a>
                         
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Action</th>
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
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/booking/edit_booking', $booking->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/booking/delete_booking', $booking->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
                                            </td>
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