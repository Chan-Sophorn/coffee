<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{

    public function read(){
        $reads = Admin::all();
        return view('dashboard.admin.read', compact('reads'));
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
}
