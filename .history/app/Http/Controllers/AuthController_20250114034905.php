<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginPage()
    {
        return view('LoginPage');  // Pastikan view LoginPage.blade.php ada di resources/views
    }
}
