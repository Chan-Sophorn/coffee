<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CoffeeName;
use App\Models\Order;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{

    public function read(){
        $reads = Admin::all();
        return view('dashboard.admin.read', compact('reads'));
    }

     public function readUser(){
    
        $user = User::all();
        return view('dashboard.user.read', compact('user'));
    }


    public function changeStatus(Request $request){
       
        $userId = $request->userId;
        $is_allow = $request->is_allow;
        $admin = Admin::find($userId);
        $admin->is_allow = $is_allow;
        $admin->save();
        $admin = Admin::find($userId);
        return $admin;
        // return response()->json($admin);
    }

    public function userStatus(Request $request){
        $userId = $request->userId;
        $is_allow = $request->is_allow;
        $user = User::find($userId);
        $user->is_allow = $is_allow;
        $user->save();
        $user = User::find($userId);
        return $user;
    }

    public function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists on admins table'
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else {
            Toastr::error('Please try again :(', 'Error');
            return redirect()->route('admin.login');
        }
    }


    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);
        $save = $admin->save(); 

        if($save) {
            Toastr::success('You are new registered successful :)', 'Success');
            return redirect()->back();
        }else {
            Toastr::error('Something went wrong, failed to register :(', 'Error');
            return redirect()->back();
        }
    }

    public function report(){
    
        $orders = Order::all();
        // dd($orders);
        // return $orders;
        return view('dashboard.admin.home',compact('orders'));
    }

    public function del($id){
        Order::findOrFail($id)->delete();
        Toastr::success('Delete Successfully :)', 'Success');
        return redirect()->route('admin.home');

    }
    
    public function search(Request $request){

        // $orders = Order::all();
        // $request->validate([
        //     'startDate'=>'required',
        //     'endDate'=>'required',
            
        // ]);

        // $startDate = $request->input('startDate');
        // $endDate = $request->input('endDate');

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if ($startDate== null || $endDate== null) {
            $orders = Order::all();
            return view('dashboard.admin.home', compact('orders'));
        }
        
        $orders = Order::where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
        // dd($orders);
        // $orders = DB::table('orders')->select()
        // ->where('date', '>=', $startDate)
        // ->where('date', '<=', $endDate)
        // ->get();
        // dd($query);
        return view('dashboard.admin.home', compact('orders'));
    }
}
