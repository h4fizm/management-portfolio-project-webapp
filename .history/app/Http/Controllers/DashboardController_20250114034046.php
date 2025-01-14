<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controlers
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
