<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationCategory;
use Illuminate\Http\Request;
use Auth;

class LocationManagementController extends Controller
{
    public function locationList()
    {
        $data['title'] = 'Location Lists';
        $data['categories'] = LocationCategory::all();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        return view('admin.pages.location.list', $data);
    }

    public function locationEdit($id = null)
    {
        $data['title'] = 'Location Management';
        $data['categories'] = LocationCategory::all();
        $data['locations'] = Location::orderBy('id', 'desc')->get();
        if ($id) {
            $data['location'] = Location::findOrFail($id);
        }
        return view('admin.pages.location.list', $data);
    }


    public function locationAddAction(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
            'location_category_id' => 'nullable|exists:location_categories,id',
            'location_description' => 'nullable|string',
        ]);

        // Create a new location record
        Location::create([
            'location_name' => $validatedData['location_name'],
            'location_category_id' => $validatedData['location_category_id'],
            'location_description' => $validatedData['location_description'],
            'added_by' => Auth::user()->id,
            'status' => '1'
            // Add any additional fields here if needed
        ]);

        // Flash success message to the session
        $request->session()->flash('success', 'Location added successfully');

        // Redirect back to the location list page
        return redirect()->back();
    }

    public function locationCategoryList()
    {
        $data['title'] = 'Location Category Lists';
        $data['lists'] = LocationCategory::orderBy('id', 'desc')->get();
        return view('admin.pages.location.categorylist', $data);
    }
    public function locationCategoryEdit($id)
    {
        $data['title'] = 'Location Category Lists';
        $data['category'] = LocationCategory::where('id', $id)->first();
        $data['lists'] = LocationCategory::orderBy('id', 'desc')->get();

        return view('admin.pages.location.categorylist', $data);
    }
   
    public function locationCategoryAddAction(Request $request)
    {
        LocationCategory::create([
            'category_name' => $request->category_name,
            'icon_class' => $request->icon_class,
            'added_by' => Auth::user()->id,
            'status' => '1'
        ]);
        $request->session()->flash('success', 'added success');
        return redirect()->back();
    }
    public function locationCategoryEditAction(Request $request, $id)
    {
        $category = LocationCategory::findOrFail($id);

        $category->update([
            'category_name' => $request->category_name,
            'icon_class' => $request->icon_class,
        ]);

        $request->session()->flash('success', 'Category updated successfully');
        return redirect()->back();
    }

    public function locationCategoryDelete(Request $request, $id)
    {
        $category = LocationCategory::whereId($id)->delete();



        $request->session()->flash('success', 'Category Deleted successfully');
        return redirect()->back();
    }
    public function locationDelete(Request $request, $id)
    {
        $category = Location::whereId($id)->delete();



        $request->session()->flash('success', 'Category Deleted successfully');
        return redirect()->back();
    }
}
