@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      <div class="card">
         <div class="card-body">
        <div class="row g-3 mb-xl-2">
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-trending-up mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Booking</div>
                <h5 class="mb-0">{{$Booking_count}}</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-account-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Customers</div>
                <h5 class="mb-0">{{$user}}</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow">
                  <i class="mdi mdi-cellphone-link mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Products</div>
                <h5 class="mb-0">{{$product}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
     


          <div class="row mt-4">
            <div class="col-md-12">
                
            <!-- Data Tables -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                          <h5 class="m-0 me-2">Recent Bookings</h5>
                        </div>
                        
                    </div>

                    <div class="card-datatable table-responsive">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                      <th>ID</th>
                                      <th>Customer</th>
                                      <th>Room Type</th>
                                      <th>Room</th>
                                      <th>Price</th>
                                      <th>Check In </th>
                                      <th>Check Out</th>
                                      <th>Payment Mode</th>
                                      <th>Due amount</th>
                                      <th>Created At</th>
                                      <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach ($bookings as $booking)
                                  <tr>
                                      <td>{{ $booking->id }}</td>
                                     
                                      <td>{{ $booking->name }}</td>
                                      <td>{{ $booking->type }}</td>
                                      <td>{{ $booking->room_name }}</td>
                                      <td>{{ $booking->price }}</td>
                                      <td>{{ $booking->checkin_date }}</td>
                                      <td>{{ $booking->checkout_date }}</td>
                                      <td>{{ $booking->payment_type }}</td>
                                      <td>{{ $booking->due_amount }}</td>
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
            <!--/ Data Tables -->
            </div>
          </div>

    </div>
@endsection
