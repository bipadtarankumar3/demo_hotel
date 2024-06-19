<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-semibold ms-2">
                {{-- <img src="{{URL::to('public/assets/admin/img/logo/logo.jpg')}}" alt="" height="50px" width="170px"> --}}
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-24px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item active">
            <a href="{{URL::to('admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div>Dashboard</div>
            </a>
        </li>
        {{-- <li class="menu-item ">
            <a href="{{URL::to('admin/user/list')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div>Customer Management</div>
            </a>
        </li> --}}



        {{-- <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <span class="mdi mdi-office-building-marker-outline mdi-24px"></span>
                <div>Hotels</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="{{URL::to('admin/hotel/list')}}" class="menu-link">
                       
                        <div>All Hotels</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/hotel/add_hotel')}}" class="menu-link">
                        <div>Add New Hotel </div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/hotel/proprity_type')}}" class="menu-link">
                        <div>Property Type</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/hotel/facility')}}" class="menu-link">
                        <div>Facility</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/hotel/hotel_service')}}" class="menu-link">
                        <div>Hotel Service</div>
                    </a>
                </li>
                

            </ul>
        </li> --}}


        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <span class="mdi mdi-office-building-marker-outline mdi-24px"></span>
                <div>Rooms</div>
            </a>

            <ul class="menu-sub">
                
                
                <li class="menu-item ">
                    <a href="{{URL::to('admin/room/amenities')}}" class="menu-link">
                        <div>Room Amenities</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/room/type')}}" class="menu-link">
                        <div>Room Types</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/room/list')}}" class="menu-link">
                        <div>Room Management</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/room/avalibility')}}" class="menu-link">
                        <div>Room Avaliblity</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-item ">
            <a href="{{URL::to('admin/booking/list')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div>Booking</div>
            </a>


        </li>

        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <span class="mdi mdi-office-building-marker-outline mdi-24px"></span>
                <div>Restaurant </div>
            </a>

            <ul class="menu-sub">
                
            
                <li class="menu-item ">
                    <a href="{{URL::to('admin/products/list')}}" class="menu-link">
                        <div>Products</div>
                    </a>
                </li>
            
                <li class="menu-item ">
                    <a href="{{URL::to('admin/order/list')}}" class="menu-link">
                        <div>Order</div>
                    </a>
                </li>
                
            </ul>
        </li>
 
        <li class="menu-item ">
            <a href="{{URL::to('admin/invoice/list')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>Invoice</div>
            </a>


        </li>
 
        {{-- <li class="menu-item ">
            <a href="icons/icons-mdi.html" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>Reports</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <span class="mdi mdi-cog  mdi-24px"></span>
                <div>Settings</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item ">
                    <a href="auth/login-basic.html" class="menu-link">
                        <div>Profile</div>
                    </a>


                </li>
               
            </ul>
        </li> --}}

    </ul>

</aside>
