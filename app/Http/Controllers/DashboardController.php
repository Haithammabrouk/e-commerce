<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
        $product =new Product();
        $order = new Order();
        $user = new User();
        return view(view:'admin.dashboard')->with(compact('order','user','product'));
    }
}
