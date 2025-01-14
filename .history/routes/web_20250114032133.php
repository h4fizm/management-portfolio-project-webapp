<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});


// Menambahkan route untuk menampilkan MainPage
Route::get('/main-page', [DashboardController::class, 'showMainPage']);
