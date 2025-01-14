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

        // Cek kredensial dengan menggunakan Auth
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil login, arahkan ke dashboard
            return redirect()->route('dashboard');
        }

        // Jika gagal login, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }

    // Fungsi untuk menampilkan halaman registrasi
    public function showRegisterPage()
    {
        return view('RegisterPage');
    }

    // Fungsi untuk menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'The email address is already registered. Please use a different email.',
        ]);

        try {
            // Buat user baru
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Kirim pesan berhasil
            return redirect()->back()->with('success', 'Registration successful! Redirecting to login page...');
        } catch (\Exception $e) {
            // Jika ada error lainnya
            return redirect()->back()->with('error', 'The email address is already registered.');
        }
    }

}
