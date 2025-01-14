<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showMainPage()
    {
        return view('MainPage');  // Pastikan view MainPage.blade.php ada di resources/views
    }
}
