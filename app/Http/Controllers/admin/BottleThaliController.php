<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\BottleThali;

class BottleThaliController extends Controller
{
    // List all Room Thalis
    public function list()
    {
        $data['title'] = 'List';
        $data['bottlethalis'] = BottleThali::where('created_by',Auth::user()->id)->get();
        return view('admin.pages.bottlethali.bottlethali', $data);
    }

    // Edit a specific Room Thali or add a new one
    public function bottlethaliEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Room Thali' : 'Add New Room Thali';
        $data['bottlethalis'] = BottleThali::where('created_by',Auth::user()->id)->get();
        $data['bottlethali'] = $id ? BottleThali::find($id) : null;

        // dd($data['bottlethali']);

        return view('admin.pages.bottlethali.bottlethali', $data);
    }

    // Update or add a new Room Thali
    public function bottlethaliUpdateOrAdd(Request $request, $id = null)
    {
 

        $data = [
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
            'created_by' => Auth::user()->id
        ];

        if ($id) {
            $bottlethali = BottleThali::find($id);
            if ($bottlethali) {
                $bottlethali->update($data);
                $message = 'Room Thali updated successfully';
            } else {
                $message = 'Room Thali not found';
            }
        } else {
         BottleThali::create($data);
            $message = 'Room Thali added successfully';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    // Delete a specific Room Thali
    public function bottlethaliDelete(Request $request, $id)
    {
        $bottlethali = BottleThali::find($id);
        if ($bottlethali) {
            $bottlethali->delete();
            $message = 'Room Thali deleted successfully';
        } else {
            $message = 'Room Thali not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }
}
