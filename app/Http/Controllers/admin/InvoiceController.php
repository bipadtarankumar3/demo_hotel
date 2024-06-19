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
