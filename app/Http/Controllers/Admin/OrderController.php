<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
     {  
         $order = Order::all();
        // $order = Order::where('status','0')->get();
        
        return view('admin.order.index',compact('order'));
    }
    public function view($id){

        $order = Order::where('id',$id)->first();
        return view('admin.order.view',compact('order'));
    }
    public function update_order(Request $request, $id)
    {
        $order = Order::find('id');
        // $order->status = $request->input('order_status');
        $order->update();
        return redirect('order')->with('status',"Order Update successfully");
    }

    public function order_history()
    {
        $order = Order::all();
        // $order = Order::where('status','1')->get();
        return view('admin.order.history',compact('order'));
    }
}
