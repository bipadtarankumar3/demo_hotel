<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class VendorAuthController extends Controller
{
    public function login(){
        return view('vendor.Auth.login');
    }
    public function vendorLoginAction(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            // dd('hi');
           
                $request->session()->flash('success', 'Login Success');
                return redirect('vendor/dashboard');
           
        } else {
            $request->session()->flash('error', 'You have entered wrong Email or Password.');
            return redirect()->back();
        }
    }
    public function dashboard(){
        return view('vendor.pages.dashboard.dashboard');
    }
    public function dashboardLogin($id){
        $user=User::Where('id',$id)->first();
        Auth::login($user);
        return view('vendor.pages.dashboard.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();


     $request->session()->flash('error','loged out');
     return redirect('vendor/login');
    }

    public function userList(){
        $data['title']='User Lists';
        return view('vendor.pages.user.list',$data);
    }
    public function changePassword(){
        $data['title']='Change Password';
        return view('vendor.Auth.change_password',$data);
    }
    public function myProfile(){
        $data['title']='My Profile';
        return view('vendor.Auth.my_profile',$data);
    }
}
