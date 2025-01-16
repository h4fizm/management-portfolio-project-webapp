<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showLandingPage()
    {
        // Ambil semua skill dan service dari database
        $skills = Skill::all();
        $services = Service::all();

        // Kirim data ke view
        return view('LandingPage', compact('skills', 'services'));
    }
}
