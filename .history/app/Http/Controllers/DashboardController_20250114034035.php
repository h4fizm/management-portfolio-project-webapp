<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controler
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
