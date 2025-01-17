<?php

namespace App\Http\Controllers;


use App\Models\Service; // Import model Service
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function showManageServicePage()
    {
        // Urutkan data berdasarkan created_at, dan ambil 5 data per halaman
        $services = Service::orderBy('created_at', 'desc')->paginate(5);

        // Tampilkan view dengan data yang di-paginate
        return view('menu.manage-service', compact('services'));
    }
}
