@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($booking) ? url('admin/booking/update/' . $booking->id) : url('admin/booking/submit-booking') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <input type="hidden" name="new_customer_id" value="{{ isset($user) ? $user->id : '' }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($booking) ? 'Edit Booking' : 'Add Booking' }}</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="customer_type" onchange="get_customer_type(this.value)" id="customer_type" class="form-control">
                                       <option value="Old" {{ isset($booking) && $booking->customer_type == 'Old' ? 'selected'  : '' }}>Old</option>
                                       <option value="New" {{ isset($booking) && $booking->customer_type == 'New' ? 'selected' : '' }}>New</option>
                                    </select>
                                    <label for="basic-default-name">Customer type</label>
                                </div>
                            </div>
                            <div class="col-md-4 old_customer">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="">-- Select Customer --</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}" {{ isset($booking) && $booking->customer_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Customer</label>
                                </div>
                            </div>
                        </div>

                        <div class="customer_rows" @if(isset($booking) && $booking->customer_type == 'New') @else style="display: none" @endif>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text"   value="{{ isset($user) ? $user->first_name : '' }}" name="first_name"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name"> First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text"   value="{{ isset($user) ? $user->last_name : '' }}" name="last_name"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name"> Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">-- Select Type --</option>
                                            <option value="Male" {{ isset($user) && $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ isset($user) && $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            
                                        </select>
                                        <label for="basic-default-name">Gender</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date"  value="{{ isset($user) ? $user->dob : '' }}" name="dob" class="form-control" id="dob" placeholder="checkout date">
                                        <label for="dob">DOB</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="email"   value="{{ isset($user) ? $user->email : '' }}" name="email"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name"> Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text"  value="{{ isset($user) ? $user->mobile : '' }}" name="mobile"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name"> Mobile</label>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($user) ? $user->state : '' }}" name="state" class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name">State</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($user) ? $user->city : '' }}" name="city"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name">City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" value="{{ isset($user) ? $user->address : '' }}" name="address"  class="form-control" id="basic-default-name" >
                                        <label for="basic-default-name">Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select name="doc_id" id="doc_id" class="form-control">
                                            <option value="">--Select ID --</option>
                                            <option value="Passport" {{ isset($user) && $user->doc_id == 'Passport' ? 'selected' : '' }}>Passport</option>
                                            <option value="Driving License" {{ isset($user) && $user->doc_id == 'Driving License' ? 'selected' : '' }}>Driving License</option>
                                            <option value="Adhar Card" {{ isset($user) && $user->doc_id == 'Adhar Card' ? 'selected' : '' }}>Adhar Card</option>
                                            
                                        
                                        </select>
                                        <label for="basic-default-name">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text"  value="{{ isset($user) ? $user->doc_id_no : '' }}" name="doc_id_no" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">ID Number</label>
                                        
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="file"  value="{{ isset($user) ? $user->id_file : '' }}" name="id_file" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">ID Upload</label>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="file"  value="{{ isset($user) ? $user->document : '' }}" name="document" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Document</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text"  value="{{ isset($user) ? $user->remarks : '' }}" name="remarks" class="form-control" id="basic-default-name">
                                        <label for="basic-default-name">Remarks</label>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control" onchange="getRooms(this.value)">
                                        <option value="">-- Select Room Type --</option>
                                        @foreach ($roomTypes as $item)
                                            <option value="{{ $item->id }}" {{ isset($booking) && $booking->room_type == $item->id ? 'selected' : '' }}>{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Room Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_id" id="room_id" class="form-control">
                                        <option value="">-- Select Room --</option>
                                        @if (isset($Rooms))
                                            @foreach ($Rooms as $item)
                                                <option value="{{ $item->id }}" {{ isset($booking) && $booking->room_id == $item->id ? 'selected' : '' }}>{{ $item->room_name }}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                                    <label for="basic-default-name">Room</label>
                                </div>
                            </div>
                        </div>

                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="date"  value="{{ isset($booking) ? $booking->checkin_date : '' }}" name="checkin_date" class="form-control" id="checkin_date" placeholder="Check In" {{ isset($booking) ? '' : 'required' }}>
                                    <label for="checkin_date">Check In</label>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="date"  value="{{ isset($booking) ? $booking->checkout_date : '' }}" name="checkout_date" class="form-control" id="checkout_date" placeholder="checkout date" {{ isset($booking) ? '' : 'required' }}>
                                    <label for="checkout_date">Check Out</label>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text"   value="{{ isset($booking) ? $booking->adults : '' }}" name="adults"  class="form-control" id="basic-default-name" >
                                    <label for="basic-default-name"> Adults</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text"  value="{{ isset($booking) ? $booking->child : '' }}" name="child"  class="form-control" id="basic-default-name" >
                                    <label for="basic-default-name"> Children</label>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            


                            <div class="col-md-3">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($booking) ? $booking->no_of_rooms : '' }}" name="no_of_rooms" class="form-control" id="basic-default-name" >
                                    <label for="basic-default-name">Number Of Rooms</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="payment_type" id="payment_type" class="form-control">
                                        <option value="">-- Select status  --</option>
                                        <option value="Due" {{ isset($booking) && $booking->payment_type == 'Due' ? 'selected' : '' }}>Due</option>
                                        <option value="Paid" {{ isset($booking) && $booking->payment_type == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        
                                    </select>
                                    <label for="basic-default-name">Payment status </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                        <option value="">-- Payment Mode  --</option>
                                        <option value="CASH" {{ isset($booking) && $booking->payment_mode == 'CASH' ? 'selected' : '' }}>CASH</option>
                                        <option value="NEFT" {{ isset($booking) && $booking->payment_mode == 'NEFT' ? 'selected' : '' }}>NEFT</option>
                                        <option value="CHQ" {{ isset($booking) && $booking->payment_mode == 'CHQ' ? 'selected' : '' }}>CHQ</option>
                                        
                                    </select>
                                    <label for="basic-default-name">Payment Mode </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($booking) ? $booking->price : '' }}" name="price"  class="form-control" id="basic-default-name" >
                                    <label for="basic-default-name">Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" value="{{ isset($booking) ? $booking->due_amount : '' }}" name="due_amount"  class="form-control" id="basic-default-name" >
                                    <label for="basic-default-name">Due Price</label>
                                </div>
                            </div>
                        </div>
                        

                        

                       

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($booking) ? 'Update' : 'Add New' }}</button>
                                <a href="{{URL::to('admin/booking/list')}}">
                                     <button class="btn btn-success mt-2" type="button">Back</button>
                            
                                </a>
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>

@endsection


@section('js')
    
<script>

    function getRooms(roomTypeId) {
        $.ajax({
            url: "{{URL::to('admin/booking/get-rooms')}}", // Adjust this URL to your route
            type: 'GET',
            data: { room_type: roomTypeId },
            success: function(response) {
                var roomSelect = $('#room_id');
                roomSelect.empty();
                roomSelect.append('<option value="">-- Select Room --</option>');
                $.each(response.rooms, function(key, room) {
                    roomSelect.append('<option value="' + room.id + '">' + room.room_name + '</option>');
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }

    function get_customer_type(cus) {
        if (cus == 'Old') {
            $('.old_customer').show();
            $('.customer_rows').hide();
        } else {
            $('.customer_rows').show();
            $('.old_customer').hide();
        }
    }

</script>

@endsection