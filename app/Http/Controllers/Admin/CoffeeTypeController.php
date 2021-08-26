<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;



class CoffeeTypeController extends Controller
{
    public function read(){
        $coftype = CoffeeType::all();

        return view('dashboard.admin.coffeetype.read', compact('coftype'));
    }

     public function index(){
        $coftype = CoffeeType::all();

        return view('dashboard.admin.coffeetype.create', compact('coftype'));
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|between:0,99',
            
        ]);

        $coftype = new CoffeeType();
        $coftype->name = $request->name;
        $coftype->price = $request->price;
        $save = $coftype->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'success');
            return redirect()->back();
        }else {
             Toastr::error('Please try again :(', 'error');
             return redirect()->back();
        }
       
    }

    public function edit($id){
    
        $coftype = CoffeeType::findOrFail($id);
        return view('dashboard.admin.coffeetype.update', compact('coftype'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|between:0,99',
            
        ]);

        $coftype = CoffeeType::findOrFail($id);
        $coftype->name = $request->name;
        $coftype->price = $request->price;
        $save = $coftype->save();
        if ($save) {
            Toastr::success('Update Successfully :)', 'success');
            return redirect()->route('admin.read');
        }else {
            Toastr::error('Please try again :(', 'error');
             return redirect()->back();
        }
       
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        CoffeeType::findOrFail($id)->delete();
        Toastr::success('Delete Successfully :)', 'Success');
        return redirect()->back();
//        return redirect()->route('admin.readcoftype');
    }
}
