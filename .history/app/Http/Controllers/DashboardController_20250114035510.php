<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginPage()
    {
        return view('LoginPage');
    }

    // Fungsi untuk menampilkan halaman registrasi
    public function showRegisterPage()
    {
        return view('RegisterPage');  // Pastikan view RegisterPage.blade.php ada di resources/views
    }
}
