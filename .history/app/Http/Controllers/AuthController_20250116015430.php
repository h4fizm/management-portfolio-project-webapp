<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginPage()
    {
        return view('LoginRegister.LoginPage');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Debugging: Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Log user yang login
            \Log::info("User logged in: " . $user->email);

            // Jika password cocok, login berhasil
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        // Jika gagal login, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Wrong Email or password',
        ])->withInput($request->only('email'));
    }



    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }

    // Fungsi untuk menampilkan halaman registrasi
   
}
