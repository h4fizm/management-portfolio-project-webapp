<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Mengimpor Controller dengan benar
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
