<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function loginForm()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['error' => 'Login failed, please try again.']);
        }
    }

    function registerForm()
    {
        return view('register');
    }

    function register(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255',
        ]);

        $validate['password'] = bcrypt($validate['password']);

        if (User::create($validate)) {
            return redirect()->route('loginForm')->with('success', 'Register success, please login.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Register failed, please try again.']);
        }
    }

    function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('loginForm');
        }
    }
}
