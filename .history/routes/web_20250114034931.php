<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;  // Pastikan mengimpor AuthController
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/login', [AuthController::class, 'showLoginPage']);  // Menampilkan view LoginPage
Route::get('/dashboard', [DashboardController::class, 'showMainPage']);

// Route untuk halaman login
