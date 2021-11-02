<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)

    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::Check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Already Added to Cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . "Added to Cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function viewcart(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitems'));
    }
    public function updateCart(Request $request){
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if (Auth::check()) {
            if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
               $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
               $cart->prod_qty = $prod_qty;
               $cart->update();
               return response()->json(['status' => "Quantity update successfully"]);
            }
        }
    }
    public function deleteProduct(Request $request)
    {
        if (Auth::Check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product delete to successfully"]);
            }
        }else {
            return response()->json(['status' => "Login to continue"]);
        }

    }



    public function cartcount()
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }


}
