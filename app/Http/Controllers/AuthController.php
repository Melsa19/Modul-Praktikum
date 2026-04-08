<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() { return view('login'); }
    public function showRegister() { return view('register'); }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        return redirect('/login')->with('success', 'Berhasil daftar!');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 'admin') { return redirect('/admin'); }
            return redirect('/');
        }
        return back()->with('error', 'Login gagal!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}