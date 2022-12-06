<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns',
            'fullname' => 'required|min:4',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        User::create([
            'email' => $request->email,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/')->with('success', 'Your account has been created. Please Login');
    }
}
