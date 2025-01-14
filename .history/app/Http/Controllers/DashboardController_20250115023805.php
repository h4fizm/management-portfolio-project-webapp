<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index()
    {
        // Menampilkan view 'MainPage.blade.php'
        return view('menu.dashboard');
    }
}
