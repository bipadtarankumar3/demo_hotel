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


class BookingController extends Controller
{
    // List all Room Thalis
    public function list()
    {
        $data['title'] = 'List';
        $data['bookings'] = Booking::select('bookings.*','users.name','room_types.type')
        ->leftJoin('users','users.id','bookings.customer_id')
        ->leftJoin('room_types','room_types.id','bookings.room_type')
        ->leftJoin('rooms','rooms.id','bookings.room_id')
        ->where('created_by',Auth::user()->id)
        ->get();
        return view('admin.pages.booking.list', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function UpdateOrAdd()
    {
        $data['title'] = 'Add New Booking';
        $data['users'] = User::where('user_type','customer')->get();
        $data['roomTypes'] = RoomType::get();
        $data['Room'] = Room::get();

        // dd($data['booking']);

        return view('admin.pages.booking.add', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function bookingEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Room Thali' : 'Add New Room Thali';
        $data['users'] = User::where('user_type','customer')->get();
        $data['roomTypes'] = RoomType::get();
        $data['Room'] = Room::get();
        $data['booking'] = $id ? Booking::find($id) : null;

        // dd($data['booking']);

        return view('admin.pages.booking.add', $data);
    }

    // Update or add a new Room Thali
    public function bookingUpdateOrAdd(Request $request, $id = null)
    {
 

        $data = [
            'customer_id' => $request->customer_id,
            'room_type' => $request->room_type,
            'room_id' => $request->room_id,
            'adults' => $request->adults,
            'child' => $request->child,
            'price' => $request->price,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'payment_type' => $request->payment_type,
            'no_of_rooms' => $request->no_of_rooms,
            'due_amount' => $request->due_amount,
            'created_by' => Auth::user()->id
        ];

        if ($id) {
            $booking = Booking::find($id);
            if ($booking) {
                $booking->update($data);
                $message = 'Booking updated successfully';
            } else {
                $message = 'Booking not found';
            }
        } else {
         Booking::create($data);
            $message = 'Booking added successfully';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    // Delete a specific Room Thali
    public function bookingDelete(Request $request, $id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            $message = 'Room Thali deleted successfully';
        } else {
            $message = 'Room Thali not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }
}