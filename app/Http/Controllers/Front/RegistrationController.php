<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
      return view(view:'front.registration.index');
    }

    public function store(Request $request){
      //validate the form

     $request->validate([
       'name'=>'required',
       'email'=>'required',
       'password'=>'required|confirmed',
       'address'=>'required',
     ]);
     //save the data
     $user = User::create([
       'name' => $request->name,
       'email' => $request->email,
       'password' => bcrypt($request->password),
       'address' => $request->address,
     ]);

     //sign the user in
     auth()->login($user);

     return redirect(to:'/user/profile');

    }
}
