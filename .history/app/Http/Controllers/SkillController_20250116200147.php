<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function showManageUserPage()
    {
        // Urutkan data berdasarkan created_at atau updated_at, dan ambil 5 data per halaman
        $users = User::orderBy('created_at', 'desc')->paginate(5); // Urutkan berdasarkan created_at (data terbaru di atas)
        return view('menu.manage-user', compact('users'));
    }
}
