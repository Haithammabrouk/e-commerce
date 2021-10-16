<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EditUserController extends Controller
{

    public function index()
    {
        return view(view: 'front.profile.edituser');
    }
    public function Update(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
        ]);


        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        session()->flash('msg','User has been updated');
        return redirect('/user/profile');
    }
}
