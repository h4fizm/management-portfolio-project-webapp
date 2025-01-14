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
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]);

            // Cek apakah email sudah terdaftar
            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->with('error', 'Email already exists. Please use another email.')->withInput();
            }

            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Login setelah registrasi berhasil
            Auth::login($user);

            // Kirim pesan sukses dengan SweetAlert
            return redirect()->route('login.page')->with('success', 'Registration successful! You can now log in.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Kirim pesan error validasi dengan SweetAlert
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Kirim pesan error umum dengan SweetAlert
            return redirect()->back()->with('error', 'Registration failed. Please try again.')->withInput();
        }
    }
}
