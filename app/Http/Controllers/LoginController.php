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
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        if ($user && Hash::check($validatedData['password'], $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);

            return redirect('/');
        } else {
            dd('incorrect credential provided');
            return view('login');
        }
    }
}
