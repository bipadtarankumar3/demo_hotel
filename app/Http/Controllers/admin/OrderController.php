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


class OrderController extends Controller
{
    
    // List all Room Thalis
    public function list()
    {
        $data['title'] = 'List';
        $data['orders'] = Order::select(
            'orders.*',
            'bottle_thalis_bottle.name as bottle_name',
            'bottle_thalis_thali.name as thali_name'
        )
        ->leftJoin('bottle_thalis as bottle_thalis_bottle', 'bottle_thalis_bottle.id', 'orders.bottle_id')
        ->leftJoin('bottle_thalis as bottle_thalis_thali', 'bottle_thalis_thali.id', 'orders.thali_id')
        ->where('orders.created_by', Auth::user()->id)
        ->get();
        return view('admin.pages.order.list', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function UpdateOrAdd()
    {
        $data['title'] = 'Add New order';
        $data['users'] = User::where('user_type','customer')->get();
        $data['roomTypes'] = RoomType::get();
        $data['Room'] = Room::get();
        $data['bottle'] = BottleThali::where('type','bottle')->get();
        $data['thalis'] = BottleThali::where('type','thali')->get();

        // dd($data['booking']);

        return view('admin.pages.order.add', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function orderEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Room Thali' : 'Add New Room Thali';
        $data['bottle'] = BottleThali::where('type','bottle')->get();
        $data['thalis'] = BottleThali::where('type','thali')->get();
        $data['order'] = $id ? Order::find($id) : null;

        // dd($data['booking']);

        return view('admin.pages.order.add', $data);
    }

    // Update or add a new Room Thali
    public function orderUpdateOrAdd(Request $request, $id = null)
    {
 

        $data = [
            'date' => $request->date,
            'bottle_id' => $request->bottle_id,
            'bottle_price' => $request->bottle_price,
            'bottle_quantity' => $request->bottle_quantity,
            'bottle_total' => $request->bottle_total,
            'thali_id' => $request->thali_id,
            'thali_price' => $request->thali_price,
            'thali_quantity' => $request->thali_quantity,
            'thali_total' => $request->thali_total,
            'sub_total' => $request->sub_total,
            'bottle_minus_price' => $request->bottle_minus_price,
            'grand_total' => $request->grand_total,
            'created_by' => Auth::user()->id
        ];

        if ($id) {
            $Order = Order::find($id);
            if ($Order) {
                $Order->update($data);
                $message = 'Order updated successfully';
            } else {
                $message = 'Order not found';
            }
        } else {
         Order::create($data);
            $message = 'Order added successfully';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    // Delete a specific Room Thali
    public function orderDelete(Request $request, $id)
    {
        $Order = Order::find($id);
        if ($Order) {
            $Order->delete();
            $message = 'Room Thali deleted successfully';
        } else {
            $message = 'Room Thali not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    public function get_products($type)
    {
        $bottlethalis = BottleThali::where('type',$type)->get();
        $products = [];
        foreach ($bottlethalis as $key => $value) {
            $products [] = array(
                'id' => $value->id, 
                'name' => $value->name, 
                'price' =>$value->price
            );
        }
    
        return response()->json($products ?? []);

    }

}
