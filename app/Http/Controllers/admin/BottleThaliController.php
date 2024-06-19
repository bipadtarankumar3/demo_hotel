<?php

namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\BottleThali;

class BottleThaliController extends Controller
{
    // List all Products
    public function list()
    {
        $data['title'] = 'List';
        $data['products'] = BottleThali::where('created_by',Auth::user()->id)->get();
        return view('admin.pages.bottlethali.bottlethali', $data);
    }

    // Edit a specific Product or add a new one
    public function bottlethaliEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Product' : 'Add New Product';
        $data['products'] = BottleThali::where('created_by',Auth::user()->id)->get();
        $data['product'] = $id ? BottleThali::find($id) : null;

        // dd($data['bottlethali']);

        return view('admin.pages.bottlethali.bottlethali', $data);
    }

    // Update or add a new Product
    public function bottlethaliUpdateOrAdd(Request $request, $id = null)
    {
 

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_by' => Auth::user()->id
        ];

        if ($id) {
            $bottlethali = BottleThali::find($id);
            if ($bottlethali) {
                $bottlethali->update($data);
                $message = 'Product updated successfully';
            } else {
                $message = 'Product not found';
            }
        } else {
         BottleThali::create($data);
            $message = 'Product added successfully';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

    // Delete a specific Product
    public function bottlethaliDelete(Request $request, $id)
    {
        $bottlethali = BottleThali::find($id);
        if ($bottlethali) {
            $bottlethali->delete();
            $message = 'Product deleted successfully';
        } else {
            $message = 'Product not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }
}
