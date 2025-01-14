<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/dashboard', [DashboardController::class, 'showMainPage']);
use App\Http\Controllers\AuthController;  // Pastikan mengimpor AuthController

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginPage']);  // Menampilkan view LoginPage
