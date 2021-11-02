<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_slug){

        $product = Product::where('slug', $product_slug)->where('status','0')->first();
        
        if ($product) {
            $prod_id = $product->id;
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $prod_id)->get();

                return view('frontend.review.index',compact('product','verified_purchase'));
        }
        else {
            return redirect()->back()->with('status',"The link you followed was broken");
        }
    }
    public function create(Request $request){
        $prod_id = $request->input('prod_id');
      
        $product = Product::where('id', $prod_id)->where('status','0')->first();
         if ($product) {
            $prod_review = $request->input('prod_review');
            $new_review = Review::create([
                'user_id'=> Auth::id(),
                'prod_id'=> $prod_id,
                'prod_review'=> $prod_review

            ]);
            $category_slug = $product->category->slug;
            $product_slug = $product->slug;
            if ($new_review) {
                return redirect('category/'.$category_slug.'/'.$product_slug)->with('status',"Thank you for your review");
            }
         }

         else {
            return redirect()->back()->with('status',"The link you followed was broken");
         }
    }


}
