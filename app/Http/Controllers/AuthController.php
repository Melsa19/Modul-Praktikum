<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Jika user sudah login, langsung tendang ke halaman utama (jangan suruh login lagi)
        if (session()->has('username')) {
            return redirect()->route('home');
        }
        return view('login'); 
    }

    // Memproses data form login
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Cek kecocokan username dan password (sementara hardcode tanpa database)
        if ($username === 'admin' && $password === '12345') {
            
            // Jika benar, simpan username ke dalam Session Laravel
            session(['username' => $username]);
            
            return redirect()->route('home');
        } else {
            // Jika salah, kembalikan ke halaman login dan bawa pesan error
            return back()->with('error', 'Username atau Password salah!');
        }
    }

    // Memproses logout
    public function logout()
    {
        // Hapus data session
        session()->forget('username');
        return redirect()->route('home');
    }
}