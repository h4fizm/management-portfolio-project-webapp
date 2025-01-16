<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Show the manage skill page.
     */
    public function showManageSkillPage()
    {
        // Urutkan data berdasarkan created_at, dan ambil 5 data per halaman
        $skills = Skill::orderBy('created_at', 'desc')->paginate(5);

        // Tampilkan view dengan data yang di-paginate
        return view('menu.manage-skill', compact('skills'));
    }
}
