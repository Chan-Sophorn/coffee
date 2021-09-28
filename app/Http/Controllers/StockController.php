<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('dashboard.admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric|between:0,999',

        ]);

        $stock = new Stock();
        $stock->name = $request->name;
        $stock->quantity = $request->qty;
        $stock->description	 = "Coffee";
        $stock->price = $request->price;
        $total = $request->price * $request->qty;
        $stock->total = $total;
        $save = $stock->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'Success');
            return redirect()->back();
        }else {
            Toastr::error('Please try again :(', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coffee = Stock::findOrFail($id);

          return view('dashboard.admin.stocks.update', compact('coffee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric|between:0,999',

        ]);

        $stock = Stock::findOrFail($id);
        $stock->name = $request->name;
        $stock->quantity = $request->qty;
        $stock->description	 = "Coffee";
        $stock->price = $request->price;
        $total = $request->price * $request->qty;
        $stock->total = $total;
        $save = $stock->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'Success');
            return redirect()->route('admin.stockCoffee.index');
        }else {
            Toastr::error('Please try again :(', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::findOrFail($id)->delete();
        Toastr::success('Delete Successful :)', 'Success');
        return redirect()->back();
    }
}
