<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = [];
        $product['products'] = Product::get();

        return view('dashboard.admin.product.product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.product.addproduct');
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
            'name' => 'required',
            'type' => 'required',
            'size' => 'required',
            'price' => 'required|numeric|between:0,99',
        ]);
//        Product::created($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        $products = Product::find($product);
        return view('dashboard.admin.product.editproduct')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'size' => 'required',
            'price' => 'required|numeric|between:0,99',
        ]);

        $product = Product::findOrFail($product);
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('admin.product')->with('message','Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
    
        Product::findOrFail($product)->delete();
        return redirect()->route('admin.product')->with('message','Delete Successfully');
    }
}
