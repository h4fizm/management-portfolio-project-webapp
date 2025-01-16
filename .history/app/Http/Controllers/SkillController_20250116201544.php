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

    /**
     * Store a new skill in the database.
     */
    public function storeSkill(Request $request)
    {
        // Validasi data input
        $request->validate([
            'skill_name' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Skill::create([
            'skill_name' => $request->skill_name,
        ]);

        // Redirect kembali ke halaman manage skill dengan pesan sukses
        return redirect()->route('manage-skill')->with('success', 'Skill added successfully!');
    }
}
