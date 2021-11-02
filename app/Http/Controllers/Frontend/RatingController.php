<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RatingController extends Controller
{
    public function add(Request $request)
    {

        $star_rated = $request->input('product_rating');
        $prod_id = $request->input('prod_id');
        $prod_check = Product::where('id', $prod_id)->where('status', '1')->first();
        // dd($prod_check);

        if ($prod_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $prod_id)->get();
            // dd($verified_purchase->count());


            if ($verified_purchase->count() > 0) {
                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                // dd($existing_rating);

                if ($existing_rating) {
                    $existing_rating->star_rated = $star_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $prod_id,
                        'star_rated' => $star_rated
                    ]);
                }
                return redirect()->back()->with('status', "Thanks for your rating");
            } else {
                return redirect()->back()->with('status', "You don't give rating without purchase");
            }
        } else {
            return redirect()->back()->with('status', "You are not login");
        }
    }
}
