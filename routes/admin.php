<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\CouponManagementController;
use App\Http\Controllers\admin\LocationManagementController;
use App\Http\Controllers\admin\PayoutManagementController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\HotelController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ExperianceController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\BottleThaliController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\OrderController;

Route::get('login', [AdminAuthController::class, 'login'])->name('login');
Route::post('admin-login-action', [AdminAuthController::class, 'adminLoginAction']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['App\Http\Middleware\AdminAuth']], function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('enquiry', [EnquiryController::class, 'enquiry']);
    Route::get('enquiry/delete/{id}', [EnquiryController::class, 'enquiry_delete']);
    Route::get('logout', [AdminAuthController::class, 'logout']);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('list', [UserManagementController::class, 'userList']);
        Route::get('add-user', [UserManagementController::class, 'UpdateOrAdd']);
        Route::post('submit-user', [UserManagementController::class, 'userUpdateOrAdd']);
        // Edit or add a room type
        Route::get('edit_user/{id?}', [UserManagementController::class, 'userEdit'])->name('userEdit');
        // Update or add a room type
        Route::post('update/{id?}', [UserManagementController::class, 'userUpdateOrAdd'])->name('userUpdateOrAdd');
        // Delete a room type
        Route::get('delete_user/{id}', [UserManagementController::class, 'userDelete'])->name('userDelete');

    });
    Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
        Route::get('list', [VendorController::class, 'vendorList']);
    });
    Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
        Route::get('list', [LocationManagementController::class, 'locationList']);
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('list', [LocationManagementController::class, 'locationCategoryList']);
            Route::post('add-action', [LocationManagementController::class, 'locationCategoryAddAction']);
            Route::get('edit/{id}', [LocationManagementController::class, 'locationCategoryEdit']);
            Route::post('edit-action/{id}', [LocationManagementController::class, 'locationCategoryEditAction']);
            Route::post('delete/{id}', [LocationManagementController::class, 'locationCategoryDelete']);
        });
    
        // Add the routes for location management
        Route::get('edit/{id?}', [LocationManagementController::class, 'locationEdit'])->name('edit'); // For displaying the edit form
        Route::post('update-action', [LocationManagementController::class, 'locationUpdateAction'])->name('update-action'); // For updating location data
        Route::post('delete/{id}', [LocationManagementController::class, 'locationDelete']);
    
        // Route for adding new location
        Route::post('add-action', [LocationManagementController::class, 'locationAddAction'])->name('add-action');
    });
    
    Route::post('document/delete/{id}', [HotelController::class, 'documetDelete']);

    Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {
        Route::get('list', [HotelController::class, 'hotelList']);
        Route::get('add_hotel', [HotelController::class, 'add_hotel']);
        Route::get('edit/{id}', [HotelController::class, 'edit_hotel']);
        Route::post('add-action', [HotelController::class, 'add_hotel_action']);
        Route::post('edit-action/{id}', [HotelController::class, 'edit_hotel_action']);
        //property
        Route::get('proprity_type', [HotelController::class, 'proprity_type']);
        Route::post('property-type/add-action', [HotelController::class, 'proprity_typeAddAction']);
        Route::post('property-type/edit-action/{id}', [HotelController::class, 'proprity_typeEditAction']);
        Route::get('property-type/edit/{id}', [HotelController::class, 'proprity_type_edit']);
        Route::post('property-type/delete/{id}', [HotelController::class, 'proprity_type_delete']);

        //facility
        Route::get('facility', [HotelController::class, 'facility']);
        Route::post('facility/add-action', [HotelController::class, 'facilityAddAction']);
        Route::get('facility/edit/{id}', [HotelController::class, 'facility_edit']);
        Route::post('facility/delete/{id}', [HotelController::class, 'facility_delete']);
        Route::post('facility/edit-action/{id}', [HotelController::class, 'facilityEditAction']);
        //privacy
        Route::get('hotel-privacy', [HotelController::class, 'hotelPrivacy']);
        Route::post('privacy/add-action', [HotelController::class, 'privacyAddAction']);
        Route::get('privacy/edit/{id}', [HotelController::class, 'privacy_edit']);
        Route::post('privacy/delete/{id}', [HotelController::class, 'privacy_delete']);
        Route::post('privacy/edit-action/{id}', [HotelController::class, 'privacyEditAction']);
        // services
        Route::get('hotel_service', [ServiceController::class, 'hotel_service']);
        Route::post('service/add-action', [ServiceController::class, 'hotel_service_add_action']);
        Route::post('service/edit-action/{id}', [ServiceController::class, 'hotel_service']);
        Route::get('service/edit/{id}', [ServiceController::class, 'hotel_service']);
        Route::post('service/delete/{id}', [ServiceController::class, 'hotel_service']);
      
    });


    Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
        Route::get('list', [CouponManagementController::class, 'couponList']);
        Route::get('add', [CouponManagementController::class, 'addCoupon']);
        Route::post('add-action', [CouponManagementController::class, 'updateOrAddCoupon']);
        Route::post('add-action/{id}', [CouponManagementController::class, 'updateOrAddCoupon']);
        Route::get('edit/{id}', [CouponManagementController::class, 'editCoupon']);
        Route::post('delete/{id}', [CouponManagementController::class, 'deleteCoupon']);
    });

    Route::group(['prefix' => 'payout', 'as' => 'payout.'], function () {
        Route::get('list', [PayoutManagementController::class, 'payoutList']);
       
    });

    Route::group(['prefix' => 'room', 'as' => 'room.'], function () {
        Route::get('amenities', [RoomController::class, 'roomamenities']);
        Route::post('amenity/add-action', [RoomController::class, 'updateOrAddAmenity']);
        Route::get('amenity/edit/{id?}', [RoomController::class, 'amenityEdit'])->name('amenity.edit');
        Route::post('amenity/update/{id?}', [RoomController::class, 'updateOrAddAmenity'])->name('amenity.update');
        Route::get('amenity/delete/{id}', [RoomController::class, 'amenityDelete'])->name('amenity.delete');


        // List all room types
        Route::get('type', [RoomController::class, 'roomTypes'])->name('roomTypes');
        Route::post('type/add-action', [RoomController::class, 'roomTypeUpdateOrAdd']);
        // Edit or add a room type
        Route::get('type/edit/{id?}', [RoomController::class, 'roomTypeEdit'])->name('roomTypeEdit');

        // Update or add a room type
        Route::post('type/update/{id?}', [RoomController::class, 'roomTypeUpdateOrAdd'])->name('roomTypeUpdateOrAdd');

        // Delete a room type
        Route::get('type/delete/{id}', [RoomController::class, 'roomTypeDelete'])->name('roomTypeDelete');


        Route::get('list', [RoomController::class, 'roomList']);
        Route::get('addRoom', [RoomController::class, 'addRoom']);
        Route::post('save_room/{id?}', [RoomController::class, 'saveRoom'])->name('room.save');
        Route::get('edit_room/{id?}', [RoomController::class, 'edit_room']);
        Route::get('delete_room_images/{id?}', [RoomController::class, 'delete_room_images']);
        Route::get('delete_room/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');

        Route::get('avalibility', [RoomController::class, 'roomAvalibility']);
        Route::get('fetchEvents', [RoomController::class, 'fetchEvents']);
    });

    Route::group(['prefix' => 'experiance', 'as' => 'experiance.'], function () {
        Route::get('list', [ExperianceController::class, 'experianceList']);
        Route::get('add-new-tour', [ExperianceController::class, 'addNewTour']);
        Route::post('submit-tour-form', [ExperianceController::class, 'submit_tour_form']);


        Route::get('category', [ExperianceController::class, 'category']);
        Route::post('category/add-action-category', [ExperianceController::class, 'categoryAddAction']);
        Route::get('category/edit/{id}', [ExperianceController::class, 'categoryEdit']);
        Route::get('category/delete/{id}', [ExperianceController::class, 'categoryDelete']);


        Route::get('attributes', [ExperianceController::class, 'attributes']);
        Route::post('attribute/add-action-attribute', [ExperianceController::class, 'attributeAddAction']);
        Route::get('attribute/edit/{id}', [ExperianceController::class, 'attributeEdit']);
        Route::get('attribute/delete/{id}', [ExperianceController::class, 'attributeDelete']);
       
    });

    
    Route::group(['prefix' => 'bottlethali', 'as' => 'bottlethali.'], function () {
       
        // List all room types
        Route::get('list', [BottleThaliController::class, 'list'])->name('list');
        Route::post('add-action', [BottleThaliController::class, 'bottlethaliUpdateOrAdd']);
        // Edit or add a room type
        Route::get('edit/{id?}', [BottleThaliController::class, 'bottlethaliEdit'])->name('bottlethaliEdit');

        // Update or add a room type
        Route::post('update/{id?}', [BottleThaliController::class, 'bottlethaliUpdateOrAdd'])->name('bottlethaliUpdateOrAdd');

        // Delete a room type
        Route::get('delete/{id}', [BottleThaliController::class, 'bottlethaliDelete'])->name('bottlethaliDelete');

       
    });
    
    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
       
        // List all room types
        Route::get('list', [BookingController::class, 'list'])->name('list');
        Route::get('add-booking', [BookingController::class, 'UpdateOrAdd']);
        Route::post('submit-booking', [BookingController::class, 'bookingUpdateOrAdd']);
        // Edit or add a room type
        Route::get('edit_booking/{id?}', [BookingController::class, 'bookingEdit'])->name('bookingEdit');
        // Update or add a room type
        Route::post('update/{id?}', [BookingController::class, 'bookingUpdateOrAdd'])->name('bookingUpdateOrAdd');
        // Delete a room type
        Route::get('delete_booking/{id}', [BookingController::class, 'bookingDelete'])->name('bookingDelete');
        Route::get('get-rooms', [BookingController::class, 'getRooms']);

       
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
       
        // List all room types
        Route::get('list', [OrderController::class, 'list'])->name('list');
        Route::get('add-order', [OrderController::class, 'UpdateOrAdd']);
        Route::post('submit-order', [OrderController::class, 'orderUpdateOrAdd']);
        // Edit or add a room type
        Route::get('edit_order/{id?}', [OrderController::class, 'orderEdit'])->name('orderEdit');
        // Update or add a room type
        Route::post('update/{id?}', [OrderController::class, 'orderUpdateOrAdd'])->name('orderUpdateOrAdd');
        // Delete a room type
        Route::get('delete_order/{id}', [OrderController::class, 'orderDelete'])->name('orderDelete');
        Route::get('get-products/{id}', [OrderController::class, 'get_products']);
       
    });

});
