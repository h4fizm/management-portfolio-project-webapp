namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showLandingPage()
    {
        // Ambil semua skill, service, dan proyek terkait dengan setiap service
        $skills = Skill::all();
        $services = Service::with('projects')->get();  // Mengambil proyek terkait dengan setiap service
        
        // Ambil resume terbaru berdasarkan created_at atau updated_at yang terbaru
        $latestResume = User::orderByRaw('GREATEST(updated_at, created_at) DESC')->first();

        // Kirim data ke view
        return view('LandingPage', compact('skills', 'services', 'latestResume'));
    }
}
