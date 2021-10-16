<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index() {
       $id =(auth()->user()->id);
       $user = User::where('id',$id)->first();
       
       
        
        return view(view:'front.profile.index')->with(compact('user'));
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view(view: 'admin.profile.index')->with(compact('user'));
    }

    public function show($id){
        $orders =Order::find($id); 
        return view(view:'front.profile.details')->with(compact('orders'));
    }
}
