<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders =Order::all();    
        return view(view:'admin.orders.index')->with(compact('orders'));
    }

    public function confirm($id){
        //find the order
        $order = Order::find($id);
        //update the order
        $order->update(['status'=> 1]);
        //session msg
        session()->flash('msg' ,'Order has been Confirmed' );
        //redirect
        return redirect(to:'admin/orders');
    }


    public function pending($id){
             //find the order
             $order = Order::find($id);
             //update the order
             $order->update(['status'=> 0]);
             //session msg
             session()->flash('msg' ,'Order has been again into pending');
             //redirect
             return redirect(to:'admin/orders');
    }

    public function show($id){
        $orders =Order::find($id); 
        return view(view:'admin.orders.details')->with(compact('orders'));
    }
        
    
}
