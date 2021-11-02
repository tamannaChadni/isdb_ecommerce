<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->save();


        $order->id;
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            Order_item::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->original_price,
            ]);

            $prod = Product::where('id',$item->prod_id)->get();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if (Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);



        return redirect('/')->with('status', "Order placed");
    }
}
