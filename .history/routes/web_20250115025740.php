<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lindungi route dashboard dengan middleware auth
Route::get('/dashboard', [DashboardController::class, 'showMainPage'])->middleware('auth')->name('dashboard');
Route::get('/profile', [ProfileController::class, 'showProfilePage'])->middleware('auth')->name('profile');
