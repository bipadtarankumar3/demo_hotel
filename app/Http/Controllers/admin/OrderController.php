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
    
    // List all Orders
    public function list()
    {
        $data['title'] = 'List';
        $data['orders'] = Order::select(
            'orders.*',
            'bottle_thalis_thali.name as product_name',
            'users.name as customer_name',
        )
        ->leftJoin('bottle_thalis as bottle_thalis_thali', 'bottle_thalis_thali.id', 'orders.item_id')
        ->leftJoin('users', 'users.id', 'orders.customer_id')
        ->where('orders.created_by', Auth::user()->id)
        ->get();
        return view('admin.pages.order.list', $data);
    }

    // Edit a specific Order or add a new one
    public function UpdateOrAdd()
    {
        $data['title'] = 'Add New order';
        $data['users'] = User::where('user_type','customer')->get();
        $data['bottle'] = BottleThali::get();
   
        // dd($data['booking']);

        return view('admin.pages.order.add', $data);
    }

    // Edit a specific Order or add a new one
    public function orderEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Order' : 'Add New Order';
        $data['bottle'] = BottleThali::get();
        $data['order'] = $id ? Order::find($id) : null;
        $data['users'] = User::where('user_type','customer')->get();
        // dd($data['booking']);

        return view('admin.pages.order.add', $data);
    }

    // Update or add a new Order
    public function orderUpdateOrAdd(Request $request, $id = null)
    {
 

        $data = [
            'date' => $request->date,
            'customer_id' => $request->customer_id,
            'item_id' => $request->item_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'sub_total' => $request->sub_total,
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

    // Delete a specific Order
    public function orderDelete(Request $request, $id)
    {
        $Order = Order::find($id);
        if ($Order) {
            $Order->delete();
            $message = 'Order deleted successfully';
        } else {
            $message = 'Order not found';
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
