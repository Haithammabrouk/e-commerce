<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
    $this->middleware(middleware:'auth');
    }
    public function index(){
        $users = User::all();
        return view(view:'admin.users.index')->with(compact('users'));
    }

    public function show($id){
        //Find the id
        $orders = Order::where('user_id', $id)->get();
       
        //Return array back to user details page
        return view(view:'admin.users.details')->with(compact('orders'));
    }
}
