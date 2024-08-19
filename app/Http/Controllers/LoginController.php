<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Memproses login pengguna
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Cek kredensial dan login pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login berhasil
            return redirect()->intended('admin')->with('success', 'Login berhasil.');
        }
        
        // Login gagal
        return redirect()->route('login')->with('error', 'Email atau kata sandi salah.');
    }

    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

}
