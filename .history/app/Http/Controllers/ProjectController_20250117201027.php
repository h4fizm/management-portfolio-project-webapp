<?php

namespace App\Http\Controllers;

use App\Models\Project; // Import model Project
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showManageProjectPage()
    {
        // Ambil data project dengan relasi service, urutkan berdasarkan created_at, dan paginasi 5 data per halaman
        $projects = Project::with('service')->orderBy('created_at', 'desc')->paginate(5);

        // Tampilkan view dengan data project
        return view('menu.manage-project', compact('projects'));
    }
}
