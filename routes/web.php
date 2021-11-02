<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbroadController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;






use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('view_category/{slug}',[FrontendController::class,'view_category']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'product_view']);


Auth::routes();
Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteProduct']);
Route::post('update-cart',[CartController::class,'updateCart']);

Route::get('cart',[CartController::class,'viewcart']);
Route::get('checkout',[CheckController::class,'index']);
Route::post('place-order',[CheckController::class,'placeorder']);


Route::get('my-order',[UserController::class,'index']);
Route::get('view-order',[UserController::class,'view']);



Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::get('load-wishlist-data',[WishlistController::class,'wishlistcount']);



Route::post('add-rating',[RatingController::class,'add']);
Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
Route::post('add-review',[ReviewController::class,'create']);
Route::get('wishlist',[WishlistController::class,'index']);
Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-to-wishlist',[WishlistController::class,'delete']);



Route::middleware(['auth'])->group(function(){
    
});

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index'); 
        // return view('admin.dashboard');
        // return view ('admin.index');
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'add']);
    Route::post('insert-category',[CategoryController::class,'insert']);

    Route::get('edit_category/{id}',[CategoryController::class,'edit']); 
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('category-delete/{id}',[CategoryController::class,'destroy']);

    Route::get('products',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']); 
    Route::post('insert-product',[ProductController::class,'insert']);

    Route::get('edit_product/{id}',[ProductController::class,'edit']); 
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::get('product-delete/{id}',[ProductController::class,'destroy']);
    
    
    // Route::get('user',[FrontendController::class,'user']);
    // Route::get('order',[FrontendController::class,'order']);
    
    
    Route::get('order', [OrderController::class,'index']);
    Route::get('admin/view-order/{id}', [OrderController::class ,'view']);
    Route::get('update-orde/{id}', [OrderController::class ,'update_order']);
    Route::get('order_history', [OrderController::class ,'order_history']);




    
    Route::get('user',[DashbroadController::class,'user']);
    Route::get('view-user/{id}',[DashbroadController::class,'view']);

    
});
