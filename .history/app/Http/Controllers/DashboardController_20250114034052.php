<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controllers
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
