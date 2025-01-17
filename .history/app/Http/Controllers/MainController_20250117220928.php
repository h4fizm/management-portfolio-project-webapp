<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;  // Tambahkan model Project
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showLandingPage()
    {
        // Ambil semua skill, service, dan proyek terkait dengan setiap service
        $skills = Skill::all();
        $services = Service::with('projects')->get();  // Mengambil proyek terkait dengan setiap service
         // Ambil resume terbaru
         $latestResume = Resume::latest()->first();  // Mengambil data resume terbaru berdasarkan created_at atau updated_at


        // Kirim data ke view
        return view('LandingPage', compact('skills', 'services'));
    }
}
