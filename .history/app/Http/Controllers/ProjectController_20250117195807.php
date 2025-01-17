<?php

namespace App\Http\Controllers;


use App\Models\Service; // Import model Service
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function showManageProjectPage()
    {

        // Tampilkan view dengan data yang di-paginate
        return view('menu.manage-project', compact('projects'));
    }
}
