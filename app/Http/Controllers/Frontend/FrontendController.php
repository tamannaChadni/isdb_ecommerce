<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()

   {
       $feature_products = Product::where('trending','1')->take(5)->get();
       $feature_category = Category::where('popular','1')->take(5)->get();

       return view('frontend.index', compact('feature_products','feature_category'));

   }
   public function category(){
       $category = Category::where('status','1')->get();
       return view('frontend.category',compact('category'));
   }
   public function view_category($slug)
   {
       if (Category::where('slug', $slug)->exists()) {
            $category= Category::where('slug', $slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('frontend.product.index',compact('products','category'));

       }else {
           return redirect('/')->with('status',"Slug doesnot exits");
       }

   }
   public function product_view($cate_slug,$prod_slug)
   {
    if (Category::where('slug', $cate_slug)->exists())
    {
        if (Product::where('slug',$prod_slug)->exists()) {
        $products = Product::where('slug',$prod_slug)->first();
        $rating = Rating::where('prod_id',$products->id)->get();
        return view('frontend.product.view',compact('products','rating'));
        }

    }else {
        return redirect('/')->with('status',"Product doesnot exits");
    }

   }

}
