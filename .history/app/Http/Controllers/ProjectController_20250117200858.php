<?php

namespace App\Http\Controllers;


use App\Models\Service; // Import model Service
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showManageProjectPage()
    {
        // Ambil data project, urutkan berdasarkan created_at, dan paginasi 5 data per halaman
        $projects = Project::with('project')->orderBy('created_at', 'desc')->paginate(5);

        // Tampilkan view dengan data project
        return view('menu.manage-project', compact('projects'));
    }
}
