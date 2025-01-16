<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Skill;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showLandingPage()
    {
        // Ambil semua skill dari database
        $skills = Skill::all();
        $services = Service::all();

        // Kirim data skills ke view
        return view('LandingPage', compact('skills, services'));
    }
}
