<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginPage()
    {
        return view('LoginRegister.LoginPage');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user);
            return redirect()->route('dashboard'); // Arahkan ke halaman dashboard setelah login berhasil
        }

        // Jika gagal login
        return back()->withErrors([
            'loginError' => 'Wrong Email or password',
        ])->withInput($request->only('email')); // Kembalikan ke halaman login dengan error dan email input
    }

    // Fungsi logout
    public function logout()
    {
        Auth::logout(); // Logout user
        return redirect()->route('login.page'); // Kembali ke halaman login setelah logout
    }

    // Menampilkan halaman registrasi
    public function showRegisterPage()
    {
        return view('LoginRegister.RegisterPage');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi input registrasi
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // Pastikan password konfirmasi ada
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

            // Logout untuk login menggunakan akun baru
            Auth::logout();

            // Kembalikan ke halaman login dengan pesan sukses
            return redirect()->route('login.page')->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            // Menangani error jika terjadi kesalahan
            return redirect()->back()->with('error', 'The email address is already registered.');
        }
    }
}
