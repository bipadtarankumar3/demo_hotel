@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($user) ? url('admin/user/update/' . $user->id) : url('admin/user/submit-user') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($user) ? 'Edit Customer' : 'Add Customer' }}</h5>
                    <div class="card-body">

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
                                    <input type="date"  value="{{ isset($user) ? $user->dob : '' }}" name="dob" class="form-control" id="dob" placeholder="checkout date" {{ isset($user) ? '' : 'required' }}>
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
                                    <input type="text"  value="{{ isset($user) ? $user->doc_id_no : '' }}" name="doc_id_no" class="form-control" id="basic-default-name" {{ isset($user) ? '' : 'required' }}>
                                    <label for="basic-default-name">ID Number</label>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file"  value="{{ isset($user) ? $user->id_file : '' }}" name="id_file" class="form-control" id="basic-default-name" {{ isset($user) ? '' : 'required' }}>
                                    <label for="basic-default-name">ID Upload</label>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="file"  value="{{ isset($user) ? $user->document : '' }}" name="document" class="form-control" id="basic-default-name" {{ isset($user) ? '' : 'required' }}>
                                    <label for="basic-default-name">Document</label>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text"  value="{{ isset($user) ? $user->remarks : '' }}" name="remarks" class="form-control" id="basic-default-name" {{ isset($user) ? '' : 'required' }}>
                                    <label for="basic-default-name">Remarks</label>
                                    
                                </div>
                            </div>
                        </div>

                       

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($user) ? 'Update' : 'Add New' }}</button>
                                <a href="{{URL::to('admin/user/list')}}">
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