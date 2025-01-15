<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showMainPage'])->name('dashboard');
    Route::get('/manage-user', [ProfileController::class, 'showManageUserPage'])->name('manage-user');
    Route::get('/profile', [ProfileController::class, 'showProfilePage'])->name('profile.page');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
});



