<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoffeeName;
use App\Models\CoffeeType;
use App\Models\Cup;
use App\Models\Order;
use App\Models\StockCup;
use App\Models\StockStraw;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


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
        $orderQtyBig = 0;
        $orderQtySmall = 0;
        $orderQtylarge = 0;
        $orderQtymeduim = 0;
        $orderQtyCsmall = 0;
        foreach($request->orders as $item){
            $order = new Order();
            // dd($item['coffee_type']['id']);
            $order->name_id =(int) $item['coffee_type']['id'];

            $coffee = CoffeeName::findOrFail($item['coffee_type']['id']);
            $type = CoffeeType::findOrFail($item['type']['id']);
            $size = Cup::findOrFail($item['size']['id']);

            if ($item['type']['name'] == "Frappe") {
                $orderQtyBig += $item['qty'];
            }else{
                $orderQtySmall += $item['qty'];
            }

            if ($item['size']['name'] == "large") {
                $orderQtylarge += $item['qty'];
            }else if ($item['size']['name'] == "medium") {
                $orderQtymeduim += $item['qty'];
            }else if ($item['size']['name'] == "small"){
                $orderQtyCsmall += $item['qty'];
            }

       
            $subPrice =floatval($item['price']) ;

            $order->type_id = (int) $item['type']['id'];
            $order->size_id = (int) $item['size']['id'];
            $order->sugar = $item['sugar'];
            $order->quantity = $item['qty'];
            $order->price = floatval($item['size']['price'])+ floatval($item['coffee_type']['price'])+floatval($item['type']['price']);
            $order->total = $subPrice ;
            $save = $order->save();

        }

        // $straw = StockStraw::where('name','=','large')->get();
        // $strawSmall = StockStraw::where('name','=','small')->get();
        $straw = StockStraw::all();
        $cup = StockCup::all();
        $id = '';
        $idSmall = '';
        $qtyLarge= 0;
        $qtySmall= 0;

        $idCupLarge = '';
        $idCupMeduim = '';
        $idCupSmall = '';
        $qtyCupLarge = 0;
        $qtyCupMeduim = 0;
        $qtyCupSmall = 0;

        foreach ($straw as $value) {
            if ($value->name == 'large') {
                $id =$value->id;
                $qtyLarge = $value->total_straw - $orderQtyBig;
                $result = StockStraw::findOrFail($id);
                $result->total_straw = $qtyLarge;
                $save = $result->save();  
            }else{
                $idSmall =$value->id;
                $qtySmall = $value->total_straw - $orderQtySmall;   
                $resultSmall = StockStraw::findOrFail($idSmall);
                $resultSmall->total_straw = $qtySmall;
                $save = $resultSmall->save(); 
            }
                // $qtyLarge = $value->total_straw - $orderQtyBig;            
                // $id = $value->id; 
        }

        foreach ($cup as  $cups) {
            if ($cups->name == 'large') {
                $idCupLarge = $cups->id;
                $qtyCupLarge = $cups->total_cup - $orderQtylarge;
                $resultCuplarge = StockCup::findOrFail($idCupLarge);
                $resultCuplarge->total_cup = $qtyCupLarge;
                $save = $resultCuplarge->save(); 
            }else if ($cups->name == 'medium') {
                $idCupMeduim = $cups->id;
                $qtyCupMeduim = $cups->total_cup - $orderQtymeduim;
                $resultCupMedium = StockCup::findOrFail($idCupMeduim);
                $resultCupMedium->total_cup = $qtyCupMeduim;
                $save = $resultCupMedium->save(); 
            }else if ($cups->name == 'small') {
                $idCupSmall = $cups->id;
                $qtyCupSmall = $cups->total_cup - $orderQtyCsmall;
                $resultCupSmall = StockCup::findOrFail($idCupSmall);
                $resultCupSmall->total_cup = $qtyCupSmall;
                $save = $resultCupSmall->save(); 
            }
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
