<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Mengimpor kelas Controler yang baru
use App\Http\Controllers\Controler;

class DashboardController extends Controler
{
    public function showMainPage()
    {
        return view('MainPage');
    }
}
