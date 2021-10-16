<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{
    public function __construct()
    {
    $this->middleware(middleware:'guest:admin')->except('logout');
    }

    public function index()
    {
        return view(view:'admin.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        //log the user in
        $credentials = ($request->only('email', 'password'));
        if (! Auth::guard(name:'admin')->attempt($credentials)){
             return back()->withErrors([
            'message' => 'Wrong credentials please try again'
        ]);
    }

        //session message
        session()->flash('msg', 'you have been logged in ');

        //redirect

        return redirect(to:'/admin');
    }
    public function logout(){
        auth()->guard('admin')->logout();

        session()->flash('msg','You have been logged out');

        return redirect(to:'/admin/login');
    }
}
