<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoffeeName;
use App\Models\CoffeeType;
use App\Models\Cup;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;
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

        // dd($request->orders);
      //  return $request;
        // $request->validate([
        //     'coffee'=>'required',
        //     'type'=>'required',
        //     'size'=>'required',
        //     'qty'=>'required',
        //     'sugar'=>'required',
        // ]);
        $save = null;
        foreach($request->orders as $item){
            $order = new Order();
            // dd($item['coffee_type']['id']);
            $order->name_id =(int) $item['coffee_type']['id'];

            $coffee = CoffeeName::findOrFail( $item['coffee_type']['id']);
            $type = CoffeeType::findOrFail($item['type']['id']);
            $size = Cup::findOrFail($item['size']['id']);

            $subPrice =floatval($item['price']) ;

            $order->type_id = (int) $item['type']['id'];
            $order->size_id = (int) $item['size']['id'];
            $order->sugar = $item['sugar'];
            $order->quantity = $item['qty'];
            $order->price = floatval($item['size']['price'])+ floatval($item['coffee_type']['price'])+floatval($item['type']['price']);
            $order->total = $subPrice ;
            $save = $order->save();

        }
        return $save;

        // if($save) {
        //     Toastr::success('You are already save :)', 'Success');
        //     return redirect()->back();
        // }else {
        //     Toastr::error('Fail, please try agian :(', 'Error');
        //     return redirect()->back();
        // }

    }
}
