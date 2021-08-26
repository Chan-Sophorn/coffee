<?php

namespace App\Http\Controllers;

use App\Models\CoffeeName;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CoffeeNameController extends Controller
{

//    public function read(){
//        $coffeename = CoffeeName::all();
//        return view('dashboard.admin.coffeename.read', compact('coffeename'));
//    }

    public function index()
    {
        $coffeename = CoffeeName::all();
        return view('dashboard.admin.coffeename.read', compact('coffeename'));

    }


    public function create()
    {
        $coffeename = CoffeeName::all();
        return view('dashboard.admin.coffeename.create', compact('coffeename'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|between:0,999',

        ]);

        $coffeename = new CoffeeName();
        $coffeename->name = $request->name;
        $coffeename->price = $request->price;
        $save = $coffeename->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'Success');
            return redirect()->back();
        }else {
            Toastr::error('Please try again :(', 'Error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        $coffeename = CoffeeName::findOrFail($id);
//        return $coffeename;
        return view('dashboard.admin.coffeename.update', compact('coffeename'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|between:0,999',

        ]);

        $coffeename = CoffeeName::findOrFail($id);
        $coffeename->name = $request->name;
        $coffeename->price = $request->price;
        $save = $coffeename->save();
        if ($save) {
            Toastr::success('Update Successfully :)', 'Success');
            return redirect()->route('admin.coffeename.index');
        } else {
            Toastr::error('Please try again :(', 'Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        CoffeeName::findOrFail($id)->delete();
        Toastr::success('Delete Successfully :)', 'Success');
        return redirect()->back();
    }
}
