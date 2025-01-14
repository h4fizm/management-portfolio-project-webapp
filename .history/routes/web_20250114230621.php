<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route untuk halaman registrasi
Route::get('/register', [AuthController::class, 'showRegisterPage']);  // Menampilkan view RegisterPage

Route::get('/dashboard', [DashboardController::class, 'showMainPage']);
