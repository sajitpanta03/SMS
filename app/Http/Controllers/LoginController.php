<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        if ($user && Hash::check($validatedData['password'], $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            if(is_null($user->created_by)){
                Session::put('super_user', 1);
            }else{
                Session::put('user_id', 0);
            }

            return redirect('/');
        } else {
            return redirect()->route('login')->withErrors('message', 'Incorrect credential provided');
        }
    }

    function logout()
    {
        session()->forget('user_id');
        session()->forget('user_name');
        session()->forget('super_user');
        return redirect()->route('login');
    }
}
