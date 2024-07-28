<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItmes;
use App\Models\BottleThali;

class ReportController extends Controller
{
    public function cash_received(Request $request)
    {
        
        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(bookings.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(bookings.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }
                if($request->customer_id!='')
                {

                    $where .= " and  bookings.customer_id =  '$request->customer_id'" ;
                    $array['customer_id'] = $request->customer_id ;
                }

            }
            $array['users'] = User::where('user_type','customer')->get();
            $array['data'] =  Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
            ->leftJoin('users','users.id','bookings.customer_id')
            ->leftJoin('room_types','room_types.id','bookings.room_type')
            ->leftJoin('rooms','rooms.id','bookings.room_id')
            ->where('bookings.payment_mode','CASH')
            ->whereRaw($where)
            ->get();
            // dd($user);
            return view('admin.pages.report.cash_received',$array);
        }
    }

    public function online(Request $request)
    {
        
        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(bookings.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(bookings.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }
                if($request->customer_id!='')
                {

                    $where .= " and  bookings.customer_id =  '$request->customer_id'" ;
                    $array['customer_id'] = $request->customer_id ;
                }

            }
            $array['users'] = User::where('user_type','customer')->get();
            $array['data'] =  Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
            ->leftJoin('users','users.id','bookings.customer_id')
            ->leftJoin('room_types','room_types.id','bookings.room_type')
            ->leftJoin('rooms','rooms.id','bookings.room_id')
            ->where('bookings.payment_mode','ONLINE')
            ->whereRaw($where)
            ->get();
            // dd($user);
            return view('admin.pages.report.online',$array);
        }
    }


    public function monthely_room_details(Request $request)
    {
        
        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(bookings.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(bookings.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }
                if($request->customer_id!='')
                {

                    $where .= " and  bookings.customer_id =  '$request->customer_id'" ;
                    $array['customer_id'] = $request->customer_id ;
                }
                if($request->room_type!='')
                {

                    $where .= " and  bookings.room_type =  '$request->room_type'" ;
                    $array['room_type'] = $request->room_type ;
                }

            }

            // dd($where);

            $array['roomTypes'] = RoomType::get();
            $array['users'] = User::where('user_type','customer')->get();
            $array['data'] =  Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
            ->leftJoin('users','users.id','bookings.customer_id')
            ->leftJoin('room_types','room_types.id','bookings.room_type')
            ->leftJoin('rooms','rooms.id','bookings.room_id')
            ->whereRaw($where)
            ->get();
            // dd($user);
            return view('admin.pages.report.monthely_room_details',$array);
        }
    }

    public function resturant_income(Request $request)
    {
        
        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(orders.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(orders.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }
                if($request->customer_id!='')
                {

                    $where .= " and  orders.customer_id =  '$request->customer_id'" ;
                    $array['customer_id'] = $request->customer_id ;
                }
              

            }

            // dd($where);

            $array['roomTypes'] = RoomType::get();
            $array['users'] = User::where('user_type','customer')->get();

            $array['data'] = Order::select(
                'orders.*',
                'bottle_thalis_thali.name as product_name',
                'users.name as customer_name',
            )
            ->leftJoin('bottle_thalis as bottle_thalis_thali', 'bottle_thalis_thali.id', 'orders.item_id')
            ->leftJoin('users', 'users.id', 'orders.customer_id')
            ->whereRaw($where)
            ->get();

       
            // dd($user);
            return view('admin.pages.report.resturant_income',$array);
        }
    }


    public function merriage_income(Request $request)
    {
        
        if(Auth::check()){

            $where = '1=1';

            if(isset($request))
            {
                
                if($request->start_date!='')
                {
                    $where .= " and  date(bookings.created_at) >=  '$request->start_date'" ;
                    $array['start_date'] = $request->start_date;
                }
                if($request->end_date!='')
                {

                    $where .= " and  date(bookings.created_at) <=  '$request->end_date'" ;
                    $array['end_date'] = $request->end_date ;
                }
                if($request->customer_id!='')
                {

                    $where .= " and  bookings.customer_id =  '$request->customer_id'" ;
                    $array['customer_id'] = $request->customer_id ;
                }
                if($request->booking_type!='')
                {
                    $where .= " and  bookings.booking_type =  '$request->booking_type'" ;
                    $array['booking_type'] = $request->booking_type ;
                }

            }

            // dd($where);

            $array['roomTypes'] = RoomType::get();
            $array['users'] = User::where('user_type','customer')->get();
            $array['data'] =  Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
            ->leftJoin('users','users.id','bookings.customer_id')
            ->leftJoin('room_types','room_types.id','bookings.room_type')
            ->leftJoin('rooms','rooms.id','bookings.room_id')
            ->whereRaw($where)
            ->get();
            // dd($user);
            return view('admin.pages.report.merriage_income',$array);
        }
    }



}
