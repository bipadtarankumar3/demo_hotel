<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use League\CommonMark\Node\Block\Document;
use App\Models\RoomAmenities;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Documents;
use App\Models\Booking;
use DB;

class RoomController extends Controller
{
 
    public function roomamenities()
    {
        $data['title'] = 'Hotel Amenities';
        $data['amenities'] = RoomAmenities::where('user_id',Auth::user()->id)->get();
        return view('admin.pages.room.amenities', $data);
    }

    public function amenityEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Amenity' : 'Add New Amenity';
        $data['amenities'] = RoomAmenities::where('user_id',Auth::user()->id)->get();
        $data['amenity'] = $id ? RoomAmenities::find($id) : null;
        return view('admin.pages.room.amenities', $data);
    }

    public function updateOrAddAmenity(Request $request, $id = null)
    {
        $validatedData = $request->validate([
            'amenities_name' => 'required|string'
        ]);

        $data = [
            'name' => $validatedData['amenities_name'],
            'user_id' => Auth::user()->id,
            'status' => 'publish' // Assuming default status is 'publish'
        ];

        if ($id) {
            $amenity = RoomAmenities::find($id);
            if ($amenity) {
                $amenity->update($data);
                $message = 'Amenity updated successfully';
            } else {
                $message = 'Amenity not found';
            }
        } else {
            RoomAmenities::create($data);
            $message = 'Amenity added successfully';
        }

        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }

    public function amenityDelete(Request $request, $id)
    {
        $amenity = RoomAmenities::find($id);
        if ($amenity) {
            $amenity->delete();
            $message = 'Amenity deleted successfully';
        } else {
            $message = 'Amenity not found';
        }

        $request->session()->flash('success',  $message);
        return redirect()->back();
    }

    // List all room types
    public function roomTypes()
    {
        $data['title'] = 'Room Types';
        $data['roomTypes'] = RoomType::where('user_id',Auth::user()->id)->get();
        return view('admin.pages.room.roomtype', $data);
    }

    // Edit a specific room type or add a new one
    public function roomTypeEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Room Type' : 'Add New Room Type';
        $data['roomTypes'] = RoomType::where('user_id',Auth::user()->id)->get();
        $data['roomType'] = $id ? RoomType::find($id) : null;
        return view('admin.pages.room.roomtype', $data);
    }

    // Update or add a new room type
    public function roomTypeUpdateOrAdd(Request $request, $id = null)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255'
        ]);

        $data = [
            'type' => $validatedData['type'],
            'user_id' => Auth::user()->id
        ];

        if ($id) {
            $roomType = RoomType::find($id);
            if ($roomType) {
                $roomType->update($data);
                $message = 'Room Type updated successfully';
            } else {
                $message = 'Room Type not found';
            }
        } else {
            RoomType::create($data);
            $message = 'Room Type added successfully';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    // Delete a specific room type
    public function roomTypeDelete(Request $request, $id)
    {
        $roomType = RoomType::find($id);
        if ($roomType) {
            $roomType->delete();
            $message = 'Room Type deleted successfully';
        } else {
            $message = 'Room Type not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    public function roomList()
    {
        $data['title'] = 'Room Management';
        $data['rooms'] = Room::select('rooms.*','room_types.type')
        ->leftJoin('room_types','room_types.id','rooms.room_type')
        ->where('rooms.user_id',Auth::user()->id)
        ->get();
        return view('admin.pages.room.list', $data);
    }
    public function addRoom()
    {
        $data['title'] = 'Add Room';
        $data['roomTypes'] = RoomType::where('user_id',Auth::user()->id)->get();
        $data['amenities'] = RoomAmenities::where('user_id',Auth::user()->id)->get();
        return view('admin.pages.room.addRoom', $data);
    }

    public function edit_room($id)
    {
        $data['title'] = 'Add Room';
        $data['room'] = Room::where('id',$id)->first();
        $data['roomTypes'] = RoomType::where('user_id',Auth::user()->id)->get();
        $data['amenities'] = RoomAmenities::where('user_id',Auth::user()->id)->get();
        $data['documents'] = Documents::where('item_id',$id)->where('table_name','rooms')->get();
        return view('admin.pages.room.addRoom', $data);
    }

    public function saveRoom(Request $request, $roomId = null)
    {

        // dd($request->all());

        // Create or retrieve the Room instance based on $roomId
        $room = $roomId ? Room::findOrFail($roomId) : new Room();

        // Set attributes
        $room->room_type = $request->input('room_type');
        $room->room_name = $request->input('room_name');
        $room->price = $request->input('price');
        $room->no_of_rooms = $request->input('no_of_rooms');
        $room->minimum_day_stay = $request->input('minimum_day_stay');
        $room->no_of_beds = $request->input('no_of_beds');
        $room->room_size = $request->input('room_size');
        $room->max_adults = $request->input('max_adults');
        $room->max_children = $request->input('max_children');
        $room->room_amenities = isset($request->room_amenities)?implode(',',$request->room_amenities):null;
        $room->status = 'active';
        $room->user_id = Auth::user()->id;
        // Add other fields here

        // Save the room
        $room->save();

        $id = $room->id;



        if ($request->hasFile('feature_image')) {
            $thumbnail = $request->file('feature_image');
            $thumbnailName = Str::uuid() . '_' . $thumbnail->getClientOriginalName(); // Unique filename
            $feature_image = '/upload/feature_image/' . $thumbnailName; // Adjust path as needed
            $thumbnail->move(public_path('upload/feature_image'), $thumbnailName);
            Room::where('id',$id)->update([
                'feature_image' => $feature_image,
            ]);
        }
        
        $request->session()->flash('success', 'Addes success');
        return redirect()->back();

    }

    public function delete_room_images($id)
    {
        Documents::where('id',$id)->delete();
    }
    public function deleteRoom($id)
    {
        Room::where('id',$id)->delete();
          
        session()->flash('success', 'Deleted success');
        return redirect()->back();
    }

    public function roomAvalibility()
    {
        $data['title'] = 'Room Management';
        $data['roomTypes'] = RoomType::where('user_id',Auth::user()->id)->get();
        return view('admin.pages.room.avalibility', $data);
    }

    public function fetchEvents(Request $request)
    {

        $room_type = $request->query('room_type');
        
        if ($room_type) {
            $bookings = DB::select("
                SELECT 
                    bk.id, 
                    rt.room_name as title, 
                    bk.checkin_date as start, 
                    bk.checkout_date as end 
                FROM 
                    bookings as bk
                LEFT JOIN rooms as rt on rt.id = bk.room_id
                WHERE 
                    bk.deleted_at IS NULL and bk.room_type = ?
            ", [$room_type]);
        } else {
            $bookings = DB::select("
                SELECT 
                    bk.id, 
                    rt.room_name as title, 
                    bk.checkin_date as start, 
                    bk.checkout_date as end 
                FROM 
                    bookings as bk
                LEFT JOIN rooms as rt on rt.id = bk.room_id
                WHERE 
                    bk.deleted_at IS NULL
            ");
        }

        return response()->json($bookings);
    }

}
