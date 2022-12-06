<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect('/dashboard')->with('islogin', 'you have successfully logged in!');
        } else {
            return redirect()->back()->with('failed', 'You Failed to Login!! Please try again');
        }
    }
}
