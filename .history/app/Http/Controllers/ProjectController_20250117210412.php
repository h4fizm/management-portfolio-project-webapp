<?php

namespace App\Http\Controllers;

use App\Models\Project; // Import model Project
use App\Models\Service; // Import model Service
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function showManageProjectPage()
    {
        // Ambil data project dengan relasi service, urutkan berdasarkan created_at, dan paginasi 5 data per halaman
        $projects = Project::with('service')->orderBy('created_at', 'desc')->paginate(5);

        // Ambil semua service untuk dropdown
        $services = Service::all();

        // Tampilkan view dengan data project dan service
        return view('menu.manage-project', compact('projects', 'services'));
    }

    public function storeProject(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'project_service' => 'required|exists:service,id', // Pastikan validasi merujuk ke tabel 'service'
            'project_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'project_link' => 'nullable|url',
        ]);

        // Upload file foto proyek
        $photoPath = $request->file('project_photo')->store('projects', 'public');

        // Simpan data proyek ke database
        Project::create([
            'project_name' => $validated['project_name'],
            'project_description' => $validated['project_description'],
            'project_service' => $validated['project_service'],
            'project_photo' => 'storage/' . $photoPath,
            'project_link' => $validated['project_link'],
        ]);

        // Redirect ke halaman manage-project dengan pesan sukses
        return redirect()->route('manage-project')->with('success', 'Project added successfully!');
    }

    // Menghapus service berdasarkan ID
    public function deleteProject($id)
    {
        $service = Project::findOrFail($id);
        $service->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('manage-service')->with('success', 'Service deleted successfully!');
    }
}
