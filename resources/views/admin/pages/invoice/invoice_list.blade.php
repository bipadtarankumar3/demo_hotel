@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="float-right my-2 text-right" style="text-align: right">
                        {{-- <a href="{{URL::to('admin/invoice/add')}}"><button type="button" class="btn btn-warning">Add</button></a> --}}
                     
                    </div>
                    {{-- <h5 class="card-header">User List</h5> --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="zero_config">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Action</th>
                                    <th>Customer</th>
                                    <th>Room Type</th>
                                    <th>Room</th>
                                    <th>Check In </th>
                                    <th>Check Out</th>
                                    <th>Payment Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/invoice/view', $booking->id) }}"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->type }}</td>
                                        <td>{{ $booking->room_name }}</td>
                                        <td>{{ $booking->checkin_date }}</td>
                                        <td>{{ $booking->checkout_date }}</td>
                                        <td>{{ $booking->payment_type }}</td>
                                        <td>{{ $booking->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
        console.error( error );
        });
    </script>
@endsection
