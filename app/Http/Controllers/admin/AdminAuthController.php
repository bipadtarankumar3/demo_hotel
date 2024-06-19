<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Booking;
use App\Models\BottleThali;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.Auth.login');
    }
    public function adminLoginAction(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(Auth::user()->user_type=="admin"){
                return redirect('admin/dashboard'); 
            }else{
                 $request->session()->flash('success', 'Login Success');
                return redirect('vendor/dashboard');  
            }
               
           
        } else {
            $request->session()->flash('error', 'You have entered wrong Email or Password.');
            return redirect()->back();
        }
    }
    public function dashboard(){

        $data['user'] = User::count();
        $data['Booking_count'] = Booking::count();
        $data['product'] = BottleThali::count();
        $data['bookings'] = Booking::select('bookings.*','rooms.room_name','users.name','room_types.type')
        ->leftJoin('users','users.id','bookings.customer_id')
        ->leftJoin('room_types','room_types.id','bookings.room_type')
        ->leftJoin('rooms','rooms.id','bookings.room_id')
        ->where('created_by',Auth::user()->id)
        ->limit(10)
        ->orderBy('bookings.id','desc')
        ->get();

        return view('admin.pages.dashboard.dashboard', $data);
    }
    public function logout(Request $request){
        Auth::logout();


     $request->session()->flash('error','loged out');
     return redirect('login');
    }

 

}
