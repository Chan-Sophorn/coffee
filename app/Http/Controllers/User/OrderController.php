<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoffeeName;
use App\Models\CoffeeType;
use App\Models\Cup;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class OrderController extends Controller
{
    public function index(){
        $readsOrder = Order::with('coffeeName')->get();
        // return $readsOrder;
        $coffee = CoffeeName::all();
        $type = CoffeeType::all();;
        $size = Cup::all();
        return view('dashboard.user.home', compact('coffee','type','size','readsOrder'));
    }

    public function storeOrder(Request $request){

      //  return $request;
        $request->validate([
            'coffee'=>'required',
            'type'=>'required',
            'size'=>'required',
            'qty'=>'required',
            'sugar'=>'required',
        ]);
        $order = new Order();
        $order->name_id = $request->coffee;
            
        $coffee = CoffeeName::findOrFail($request->coffee);
        $type = CoffeeType::findOrFail($request->type);
        $size = Cup::findOrFail($request->size);

        $subPrice = $coffee->price + $type->price + $size->price;
    
        $order->type_id = $request->type;
        $order->size_id = $request->size;
        $order->sugar = $request->sugar;
        $order->quantity = $request->qty;
        $order->price = $subPrice;
        $order->total = $subPrice * $request->qty;
        
        $save = $order->save();
        if($save) {
            Toastr::success('You are already save :)', 'Success');
            return redirect()->back();
        }else {
            Toastr::error('Fail, please try agian :(', 'Error');
            return redirect()->back();
        }

    }
}
