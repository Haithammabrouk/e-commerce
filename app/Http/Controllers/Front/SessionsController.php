<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class SessionsController extends Controller
{
    public function __construct()
    {
    $this->middleware(middleware:'guest')->except('logout');
    }

    public function index(){
        return view(view:'front.sessions.index');
    }

    public function store(Request $request){
        //Validate the user
        $rules =[
            'email' => 'required|email',
            'password' => 'required',
        ];
        $request->validate($rules);
        
        //Check if user exists
        $data = request(['email','password']);
        if ( ! auth()->attempt($data) ){
            return back()->withErrors([
                'message' => 'Wrong Credintals please try agian'
            ]);
        }
        return redirect(to:'/user/profile');
    }
    public function logout(){
        auth()->logout();

        session()->flash('msg','You have been logged out successfully');

        return redirect(to:'/user/login');
    }
}

