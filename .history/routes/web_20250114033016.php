<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/dashboard', [DashboardController::class, 'showMainPage']);
