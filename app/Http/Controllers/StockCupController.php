<?php

namespace App\Http\Controllers;

use App\Models\StockCup;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StockCupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockCups = StockCup::all();
        return view('dashboard.admin.stockCup.index', compact('stockCups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.stockCup.create');
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

        $stockCup = new StockCup();
        $stockCup->name = $request->name;
        $stockCup->quantity = $request->qty;
        $stockCup->total_cup = $request->qty * 100;
        $stockCup->price = $request->price;
        $total = $request->price * $request->qty;
        $stockCup->total_price = $total;
        $save = $stockCup->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
