<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Jangan lupa menambahkan penggunaan Controller
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
