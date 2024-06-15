@extends('vendor.layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="" class="browser-default-validation">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">1. Content</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">2. Location</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">3. Pricing</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="ATTRIBUTES-tab" data-bs-toggle="tab" data-bs-target="#ATTRIBUTES" type="button" role="tab" aria-controls="ATTRIBUTES" aria-selected="false">4. Attributes</button>
              </li>
           
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <h5 class="card-header">Hotel Content</h5>
                    <div class="card-body">
                  
                        <div class="form-floating form-floating-outline mb-4">
                          <input type="text" class="form-control" id="basic-default-name" placeholder="Name of the hotel" required="">
                          <label for="basic-default-name">Title</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <textarea name="" class="form-control" id="Content" ></textarea>
                          <label for="Content">Content</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="Youtube Video" required="">
                            <label for="basic-default-name">Youtube Video</label>
                          </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="file" class="form-control" id="basic-default-name" placeholder="Banner Image" required="">
                            <label for="basic-default-name">Banner Image</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="file" multiple class="form-control" id="basic-default-name" >
                            <label for="basic-default-name">Gallery Image</label>
                        </div>
                        
                        
                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Hotel Policy</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Rating" required="">
                                    <label for="basic-default-name">Hotel Rating Standard</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name of the hotel" required="">
                                    <label for="basic-default-name">Title</label>
                                  </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating form-floating-outline mb-4">
                                    <textarea name="" class="form-control" id="Content" ></textarea>
                                  <label for="Content">Content</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <i class="fa-solid fa-trash" style="color: red"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name of the hotel" required="">
                                    <label for="basic-default-name">Title</label>
                                  </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating form-floating-outline mb-4">
                                    <textarea name="" class="form-control" id="Content" ></textarea>
                                  <label for="Content">Content</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <i class="fa-solid fa-trash" style="color: red"></i>
                            </div>
                        </div>
                  
                        
                        
                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Featured Image</h5>
                    <div class="card-body">
                  
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="file" class="form-control" id="basic-default-name" placeholder="Banner Image" required="">
                            <label for="basic-default-name">Featured Image</label>
                        </div>
                        
                        
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               
                <div class="card">
                    <div class="card-body">
                  
                        <div class="form-floating form-floating-outline mb-4">
                          <input type="text" class="form-control" id="basic-default-name" placeholder="Location" required="">
                          <label for="basic-default-name">Location</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <textarea name="" class="form-control" id="Content" ></textarea>
                          <label for="Content">Real Address</label>
                        </div>
                        <div style="width: 100%">
                            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                <a href="https://www.gps.ie/">gps devices</a>
                            </iframe>
                        </div>
                        
                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Surrounding</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Education</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Distance</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Content" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Distance" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="M" required="">
                                                    
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row float-right mt-2" style="text-align: right">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info">Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Health</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Distance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Content" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Distance" required="">
                                                    
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row float-right mt-2" style="text-align: right">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info">Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Transportation</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Distance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Content" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Distance" required="">
                                                    
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row float-right mt-2" style="text-align: right">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info">Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Adventures</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Distance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Content" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Distance" required="">
                                                    
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row float-right mt-2" style="text-align: right">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info">Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Experience</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Content</th>
                                            <th>Distance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Name" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Content" required="">
                                                    
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="form-floating form-floating-outline mb-4">
                                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Distance" required="">
                                                    
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row float-right mt-2" style="text-align: right">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-info">Add Item</button>
                                    </div>
                                </div>
                            </div>
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
                                    <input type="time" class="form-control" id="basic-default-name" placeholder="Name of the hotel" required="">
                                    <label for="basic-default-name">Time for check in</label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="time" class="form-control" id="basic-default-name" placeholder="Name of the hotel" required="">
                                    <label for="basic-default-name">Time for check out</label>
                                  </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Minimum advance reservations" required="">
                                    <label for="basic-default-name">Minimum advance reservations</label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Minimum day stay requirments" required="">
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
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="Price" required="">
                                    <label for="basic-default-name">Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Enable Extra Price</label>
                                    </div>
                                  </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Service Fee</label>
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
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Hotels</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Attribute: Facilities</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Wake-up Call</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Attribute: Hotel Service</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Havana Lobby Bar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <h5 class="card-header">Attribute: Privacy</h5>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
                                      <label class="form-check-label" for="basic-default-checkbox">Gated Community</label>
                                    </div>
                                </div>
                            </div>
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