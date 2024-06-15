@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>

        <form action="{{URL::To('admin/hotel/add-action')}}" method="post" enctype="multipart/form-data" class="browser-default-validation">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">1. Content</button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">3. Pricing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ATTRIBUTES-tab" data-bs-toggle="tab" data-bs-target="#ATTRIBUTES"
                        type="button" role="tab" aria-controls="ATTRIBUTES" aria-selected="false">4.
                        Attributes</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <h5 class="card-header">Hotel Content</h5>
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-name" name="title"
                                    placeholder="Name of the hotel" >
                                <label for="basic-default-name">Title</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <textarea name="content" class="form-control" id="Content"></textarea>
                                <label for="Content">Content</label>
                            </div>

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" class="form-control" id="basic-default-name" name="banner_image"
                                    placeholder="Banner Image" >
                                <label for="basic-default-name">Banner Image</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" name="gallery_image[]" multiple class="form-control"
                                    id="basic-default-name">
                                <label for="basic-default-name">Gallery Image</label>
                            </div>


                        </div>
                    </div>


                    <div class="card mt-4">
                        <h5 class="card-header">Featured Image</h5>
                        <div class="card-body">

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="file" class="form-control" name="feature_image" id="basic-default-name"
                                    placeholder="Banner Image" >
                                <label for="basic-default-name">Featured Image</label>
                            </div>


                        </div>
                    </div>

                </div>
      
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                    <div class="card mt-4">
                        <h5 class="card-header">Check in/out time</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="time" class="form-control" id="basic-default-name"
                                            placeholder="Name of the hotel" name="check_in_time" >
                                        <label for="basic-default-name">Time for check in</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="time" class="form-control" id="basic-default-name"
                                            placeholder="Name of the hotel"  name="check_out_time">
                                        <label for="basic-default-name">Time for check out</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="minimum_advance_reservaction" id="basic-default-name"
                                            placeholder="Minimum advance reservations" >
                                        <label for="basic-default-name">Minimum advance reservations</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            placeholder="Minimum day stay requirments" name="maximum_day_stay_req" >
                                        <label for="basic-default-name">Minimum day stay requirments</label>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Pricing</h5>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            placeholder="Price"  name="price">
                                        <label for="basic-default-name">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="basic-default-checkbox"
                                               value="1" name="exctera_price">
                                            <label class="form-check-label"  for="basic-default-checkbox">Enable Extra
                                                Price</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="service_fee" value="1" class="form-check-input" id="basic-default-checkbox"
                                                >
                                            <label class="form-check-label" for="basic-default-checkbox">Service
                                                Fee</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ATTRIBUTES" role="tabpanel" aria-labelledby="ATTRIBUTES-tab">

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Property Type</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($propertyTypes as $propertyT)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="property_type[]" class="form-check-input"
                                                    id="basic-default-checkbox" value="{{ $propertyT->id }}">
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $propertyT->property_type }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Facilities</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($facilities as $facility)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="facility[]" class="form-check-input"
                                                    id="basic-default-checkbox" value="{{ $facility->id }}">
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $facility->facility_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Attribute: Hotel Service</h5>
                        <div class="card-body">

                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="service[]" value="{{ $service->id }}" class="form-check-input"
                                                    id="basic-default-checkbox" >
                                                <label class="form-check-label"
                                                    for="basic-default-checkbox">{{ $service->service_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info">Save</button>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('js')
    <script>
        function add_more_hotel_policy() {
            var html = `
                <div class="row mt-4">
                    <div class="col-md-5">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="text" class="form-control" name="policy_title[]" id="basic-default-name"
                                            placeholder="Name of the hotel" >
                                        <label for="basic-default-name">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <textarea name="policy_content[]" class="form-control" id="Content"></textarea>
                                        <label for="Content">Content</label>
                                    </div>
                                </div>
                    <div class="col-md-2">
                        
                            <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_policy(this)" aria-hidden="true"></i>
                        
                    </div>
                </div>
            `;
            $('.dynamic_hotel_field').append(html);
        }

        function remove_hotel_policy(element) {
            // Find the closest parent row and remove it
            $(element).closest('.row').remove();
        }

        function add_more_hotel_education() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_name[]" placeholder="Name" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_content[]" placeholder="Content" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="education_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_education(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_education');
        }

        function remove_hotel_education(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_health() {
            var html = `
               
                    <tr>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control"
                                id="basic-default-name" placeholder="Name" name="health_name[]" >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control"
                                id="basic-default-name" placeholder="Content" name="health_content[]" >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="health_distance[]"
                                id="basic-default-name" placeholder="Distance"
                                >

                        </div>
                    </td>
                    <td>
                        <div class="form-floating form-floating-outline mb-4">
                            <div class="col-md-12 text-right">
                                <a class="extra-fields">
                                    <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_health(this)" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_health');
        }

        function remove_hotel_health(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_transpotation() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="transpotaion_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="transpotaion_content[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="transpotaion_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_transpotation(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_transpotation');
        }

        function remove_hotel_transpotation(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_adventures() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="adventure_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="adventure_conent[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="adventure_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_adventures(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_adventures');
        }

        function remove_hotel_adventures(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }

        function add_more_hotel_experience() {
            var html = `
               
                    <tr>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Name" name="exprience_name[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" placeholder="Content" name="exprience_content[]" >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control"
                                    id="basic-default-name" name="exprience_distance[]" placeholder="Distance"
                                    >

                            </div>
                        </td>
                        <td>
                            <div class="form-floating form-floating-outline mb-4">
                                <div class="col-md-12 text-right">
                                    <a class="extra-fields">
                                        <i class="fa fa-trash" style="color:red;" onclick="remove_hotel_experience(this)" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                   
              
            `;
            $(html).insertAfter('.dynamic_experience');
        }

        function remove_hotel_experience(element) {
            // Find the closest parent row and remove it
            $(element).closest('tr').remove();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.next-tab').click(function() {
                var $activeTab = $('.nav-tabs .nav-link.active');
                var nextTab = $activeTab.parent().next().find('a');

                // Switch to next tab
                nextTab.tab('show');
            });
        });
    </script>
@endsection
