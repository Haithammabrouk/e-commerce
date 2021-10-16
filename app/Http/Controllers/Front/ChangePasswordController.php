<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.profile.changepassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $data = $request->all();

        if (!\Hash::check($data['current_password'], auth()->user()->password)) {

            return back()->withErrors(['You Have Entered Wrong Password']);
        } else {

            User::find(auth()->user()->id)->update(['password' => bcrypt($request->new_password)]);
            session()->flash('msg', 'Password has been changed');
            return redirect('/user/profile');
        }
    }
}
