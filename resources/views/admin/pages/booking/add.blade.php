@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($booking) ? url('admin/booking/update/' . $booking->id) : url('admin/booking/submit-booking') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($booking) ? 'Edit Booking' : 'Add Booking' }}</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <select name="room_type" id="room_type" class="form-control">
                                        <option value="">-- Select Room Type --</option>
                                        @foreach ($roomTypes as $item)
                                            <option value="{{ $item->id }}" {{ isset($booking) && $booking->room_type == $item->id ? 'selected' : '' }}>{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-name">Room Type</label>
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
                                        <option value="">-- Select Type --</option>
                                        <option value="Due" {{ isset($booking) && $booking->payment_type == 'Due' ? 'selected' : '' }}>Due</option>
                                        <option value="Paid" {{ isset($booking) && $booking->payment_type == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        
                                    </select>
                                    <label for="basic-default-name">Payment Type</label>
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
    $(document).ready(function(){
        // Remove row
        $(document).on('click', '.remove-row', function(){
            $(this).closest('tr').remove();
        });
    });


    function add_more_row() {
        var newRow = '<tr>' +
                '<td><input type="text" name="document_text_name[]" class="form-control" placeholder="Name"></td>' +
                '<td><input type="file" name="document[]" class="form-control"></td>' +
                '<td><button type="button" class="btn btn-danger waves-effect waves-light remove-row"><i class="fa-solid fa-trash"></i></button></td>' +
                '</tr>';
            $(".table_body_row").append(newRow)
    }

    function remove_row_with_data(get_this,id) {

        $.ajax({
            type: "GET",
            url: "{{URL::to('admin/room/delete_room_images/')}}"+"/"+id,// where you wanna post
            data: {
                'id':''
            },
            error: function(jqXHR, textStatus, errorMessage) {
                console.log(errorMessage); // Optional
            },
            success: function(data) {
               
            } 
        });

        $(get_this).closest('tr').remove();


    }

</script>

@endsection