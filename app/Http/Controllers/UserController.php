<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerView()
    {
        return view('users.regi');
    }

    public function regi(Request $request)
    {
        $request->validate([
            "login" => "required|unique:users",
            "name" => "required|unique:users",
            "email" => "required",
            "password" => "required|confirmed",
        ]);
        $request->merge(["password" => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('auth');
    }

    public function authView()
    {
        return view('users.auth');
    }

    public function auth(Request $request)
    {
        $request->validate([
            "login" => "required",
            "password" => "required",
        ]);
        if (Auth::attempt($request->only('login', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('/');
        }
        else {
            echo 'не верные данные';
        }
    }

    public function Exit()
    {
        Auth::logout();
        return redirect()->route('auth');
    }
}
