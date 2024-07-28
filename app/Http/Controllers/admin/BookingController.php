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
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    // List all Room Thalis
    public function list()
    {
        $data['title'] = 'List';
        $data['bookings'] = Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
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
        $data['roomTypes'] = RoomType::where('status','publish')->get();
        $data['Room'] = Room::get();

        // dd($data['booking']);

        return view('admin.pages.booking.add', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function bookingEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Room Thali' : 'Add New Room Thali';
        $data['users'] = User::where('user_type','customer')->get();
        
        $data['roomTypes'] = RoomType::where('status','publish')->get();
        $data['booking']  = $booking = $id ? Booking::find($id) : null;
        $data['Rooms'] = Room::where('room_type',$booking->room_type)->get();
        $data['user'] = User::where('id',$booking->customer_id)->first();

        // dd($data['booking']);

        return view('admin.pages.booking.add', $data);
    }

    // Update or add a new Room Thali
    public function bookingUpdateOrAdd(Request $request, $id = null)
    {
 

        if ($request->customer_type == 'Old') {
            $data = [
                'customer_type' => $request->customer_type,
                'customer_id' => $request->customer_id,
                'booking_type' => $request->booking_type,
                'room_type' => $request->room_type,
                'room_id' => $request->room_id,
                'adults' => $request->adults,
                'child' => $request->child,
                'price' => $request->price,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'payment_type' => $request->payment_type,
                'payment_mode' => $request->payment_mode,
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
        } else {

            $customer_id = $request->customer_id;

            // Create or retrieve the Room instance based on $id
            $user = $customer_id ? User::findOrFail($customer_id) : new User();

            // Set attributes
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->name = $request->input('first_name').$request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make(12345678);
            $user->user_type = 'customer';
            $user->gender = $request->input('gender');
            $user->dob = $request->input('dob');
            $user->mobile = $request->input('mobile');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->address = $request->input('address');
            $user->doc_id = $request->input('doc_id');
            $user->doc_id_no = $request->input('doc_id_no');

            if ($request->hasFile('id_file')) {
                $thumbnail = $request->file('id_file');
                $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
                $id_file = '/upload/' . $thumbnailName; // Adjust path as needed
                $thumbnail->move(public_path('upload'), $thumbnailName);
                $user->id_file = $id_file;
            }
            if ($request->hasFile('document')) {
                $thumbnail = $request->file('document');
                $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
                $document = '/upload/' . $thumbnailName; // Adjust path as needed
                $thumbnail->move(public_path('upload'), $thumbnailName);
                $user->document = $document;
            }
            $user->remarks = $request->input('remarks');
            $user->vip = $request->input('vip');
            // Save the user
            $user->save();

            $data = [
                'booking_type' => $request->booking_type,
                'customer_type' => $request->customer_type,
                'customer_id' => $user->id,
                'room_type' => $request->room_type,
                'room_id' => $request->room_id,
                'adults' => $request->adults,
                'child' => $request->child,
                'price' => $request->price,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'payment_type' => $request->payment_type,
                'payment_mode' => $request->payment_mode,
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
                $message = 'Booking created successfully';
            }

            

   

        }
        
        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    public function getRooms(Request $request) {
        $roomTypeId = $request->input('room_type');
        $rooms = Room::where('room_type', $roomTypeId)->get();
    
        return response()->json(['rooms' => $rooms]);
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
