<?php

namespace App\Http\Controllers;

use App\Models\StockStraw;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class stockStrawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockStraw = StockStraw::all();
        return view('dashboard.admin.stockstraws.index', compact('stockStraw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.stockstraws.create');
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

        $straws = new StockStraw();
        $straws->name = $request->name;
        $straws->quantity = $request->qty;
        $straws->total_straw = $request->qty * 100;
        $straws->price = $request->price;
        $total = $request->price * $request->qty;
        $straws->total_price = $total;
        $save = $straws->save();
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
        $straw = StockStraw::findOrFail($id);

          return view('dashboard.admin.stockstraws.update', compact('straw'));
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

        $straws = StockStraw::findOrFail($id);
        $straws->name = $request->name;
        $straws->quantity = $request->qty;
        $straws->total_straw = $request->qty * 100;
        $straws->price = $request->price;
        $total = $request->price * $request->qty;
        $straws->total_price = $total;
        $save = $straws->save();
        if ($save) {
            Toastr::success('Save Successfully :)', 'Success');
            return redirect()->route('admin.stockstraw.index');
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
        $delete = StockStraw::findOrFail($id)->delete();
        if ($delete) {
            Toastr::success('Delete Successfully :)', 'Success');
            return redirect()->route('admin.stockstraw.index');
        }

    }
}
