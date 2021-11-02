<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('frontend.wishlist', compact('wishlist'));
    }
    public function add(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('product_id');
            $prod_check = Product::find($prod_id);
            if ($prod_check) {
                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Already Added to Wishlist"]);
                } else {
                    $wishlist = new Wishlist();
                    $wishlist->prod_id = $prod_id;
                    $wishlist->user_id = Auth::id();
                    $wishlist->save();
                    return response()->json(['status' => "Product added to wishlist"]);
                }
            }
        } else {
            return response()->json(['status' => "Page is broken"]);
        }
    }
    public function delete(Request $request)
    {
        if (Auth::Check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wishlist = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => "Product delete to successfully"]);
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistcount]);
    }
}
