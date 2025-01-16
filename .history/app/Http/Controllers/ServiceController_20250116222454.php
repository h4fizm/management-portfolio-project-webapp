<?php

namespace App\Http\Controllers;

use App\Models\Service; // Import model Service
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showManageServicePage()
    {
        // Ambil semua data dari tabel service
        $services = Service::all();

        // Kirim data ke view 'menu.manage-service'
        return view('menu.manage-service', compact('services'));
    }
}
