<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPage');
});

use App\Http\Controllers\DashboardController;

// Menambahkan route untuk menampilkan MainPage
Route::get('/main-page', [DashboardController::class, 'showMainPage']);
