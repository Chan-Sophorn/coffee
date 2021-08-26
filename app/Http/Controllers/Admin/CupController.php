<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeType;
use App\Models\Cup;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CupController extends Controller
{
     public function read(){
        $cups = Cup::all();

        return view('dashboard.admin.type.read', compact('cups'));
    }

     public function index(){

        $cups = Cup::all();
        return view('dashboard.admin.type.cup', compact('cups'));
         
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|between:0,99',
            
        ]);

        $cup = new Cup();
        $cup->name = $request->name;
        $cup->price = $request->price;
        $save = $cup->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'success');
            return redirect()->back();
        }else {
            Toastr::error('Please try again :(', 'error');
             return redirect()->back();
        }
       
    }

     public function edit($id){
    
        $cup = Cup::findOrFail($id);
        return view('dashboard.admin.type.cupupdate', compact('cup'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|between:0,99',
            
        ]);

        $cup = Cup::findOrFail($id);
        $cup->name = $request->name;
        $cup->price = $request->price;
        $save = $cup->save();
        if ($save) {
            Toastr::success('Update Successfully :)', 'success');
            return redirect()->route('admin.read');
        }else {
            Toastr::error('Please try again :(', 'error');
             return redirect()->back();
        }
       
    }

    public function delete($id){
         Cup::findOrFail($id)->delete();
         Toastr::success('Delete Successfully :)', 'Success');
         return redirect()->route('admin.read');
    }


}
