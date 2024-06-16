<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function userList(){
        $data['title']='User Lists';
        $data['users']=User::where('user_type','customer')->get();
        return view('admin.pages.user.list',$data);
    }

    // Edit a specific Customer or add a new one
    public function UpdateOrAdd()
    {
        $data['title'] = 'Add New user';

        return view('admin.pages.user.add', $data);
    }

    // Edit a specific Customer or add a new one
    public function userEdit($id = null)
    {
        $data['title'] = $id ? 'Edit Customer' : 'Add New Customer';
        $data['user'] = $id ? User::find($id) : null;

        // dd($data['user']);

        return view('admin.pages.user.add', $data);
    }

    // Update or add a new Customer
    public function userUpdateOrAdd(Request $request, $id = null)
    {
 

        // Create or retrieve the Room instance based on $id
        $user = $id ? User::findOrFail($id) : new User();

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

              
        $request->session()->flash('success', 'User Uploaded');
        return redirect()->back();
    }

    // Delete a specific Customer
    public function userDelete(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $message = 'Customer deleted successfully';
        } else {
            $message = 'Customer not found';
        }

        $request->session()->flash('success', $message);
        return redirect()->back();
    }

}
