<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function showMainPage()
    {
        // Menampilkan view 'MainPage.blade.php'
        return view('MainPage');
    }
}
