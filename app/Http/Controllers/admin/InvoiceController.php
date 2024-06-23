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


class InvoiceController extends Controller
{
    // List all Orders
    public function list()
    {
        $data['title'] = 'List';
        $data['bookings'] = Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
        ->leftJoin('users','users.id','bookings.customer_id')
        ->leftJoin('room_types','room_types.id','bookings.room_type')
        ->leftJoin('rooms','rooms.id','bookings.room_id')
        ->where('created_by',Auth::user()->id)
        ->get();
        return view('admin.pages.invoice.invoice_list', $data);
    }

    // List all Orders
    public function view($id)
    {
        $data['title'] = 'List';

        $data['booking'] = $booking = Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
        ->leftJoin('users','users.id','bookings.customer_id')
        ->leftJoin('room_types','room_types.id','bookings.room_type')
        ->leftJoin('rooms','rooms.id','bookings.room_id')
        ->where('bookings.id',$id)
        ->first();

        if ($booking) {
            $data['customer'] = User::where('id', $booking->customer_id)->first();
            $checkin_date  = $booking->checkin_date;
            $checkout_date  = $booking->checkout_date;

            $data['orders'] = Order::where('customer_id',$booking->customer_id)
            ->leftJoin('bottle_thalis','bottle_thalis.id','orders.item_id')
            ->whereDate('date','>=',$checkin_date)
            ->whereDate('date','<=',$checkout_date)
            ->get(); 

        }else{
            $data['customer'] = [];
            $data['orders'] = [] ;
        }

        
        // $data['orders'] = Order::select(
        //     'orders.*',
        //     'bottle_thalis_thali.name as product_name',
        //     'users.name as customer_name',
        // )
        // ->leftJoin('bottle_thalis as bottle_thalis_thali', 'bottle_thalis_thali.id', 'orders.item_id')
        // ->leftJoin('users', 'users.id', 'orders.customer_id')
        // ->where('orders.created_by', Auth::user()->id)
        // ->get();
        return view('admin.pages.invoice.invoice_view', $data);
    }
}
