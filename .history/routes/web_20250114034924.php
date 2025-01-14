<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;  // Pastikan mengimpor AuthController

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/dashboard', [DashboardController::class, 'showMainPage']);

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginPage']);  // Menampilkan view LoginPage
