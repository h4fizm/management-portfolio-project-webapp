<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginPage()
    {
        return view('LoginPage');
    }

    // Fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil login, arahkan ke halaman utama
            return redirect()->route('main.page');
        }

        // Jika gagal login, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Fungsi untuk menampilkan halaman registrasi
    public function showRegisterPage()
    {
        return view('RegisterPage'); // Pastikan view RegisterPage.blade.php ada di resources/views
    }
}
