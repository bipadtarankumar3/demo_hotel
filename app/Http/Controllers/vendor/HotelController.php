<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function hotelList(){
        $data['title']='Hotel Lists';
        return view('vendor.pages.hotel.list',$data);
    }

    public function add_hotel(){
        $data['title']='Hotel Add';
        // return view('vendor.pages.hotel.add_hotel',$data);
        return view('vendor.pages.hotel.add_hotel2',$data);
    }

    
    public function roomtype(){
        $data['title']='Room Type';
        return view('vendor.pages.room.roomtype',$data);
    }
    public function roomList(){
        $data['title']='Room Management';
        return view('vendor.pages.room.list',$data);
    }

    public function addRoom(){
        $data['title']='Add Room';
        return view('vendor.pages.room.addRoom',$data);
    }

    public function roomAvalibility(){
        $data['title']='Room Management';
        return view('vendor.pages.room.avalibility',$data);
    }


}
