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
        try {
            // Validasi data input
            $validated = $request->validate([
                'project_name' => 'required|string|max:255',
                'project_description' => 'required|string',
                'project_service' => 'required|exists:service,id',
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
        } catch (\Exception $e) {
            // Redirect ke halaman manage-project dengan pesan error
            return redirect()->route('manage-project')->with('error', 'Failed to add project: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit proyek
public function editProject($id)
{
    $project = Project::findOrFail($id);
    $services = Service::all(); // Ambil data service untuk dropdown

    return view('menu.manage-project-edit', compact('project', 'services'));
}

// Update data proyek
public function updateProject(Request $request, $id)
{
    try {
        // Validasi data input
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'project_service' => 'required|exists:service,id',
            'project_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'project_link' => 'nullable|url',
        ]);

        $project = Project::findOrFail($id);

        // Cek apakah ada foto yang diupload
        if ($request->hasFile('project_photo')) {
            // Hapus foto lama jika ada
            if ($project->project_photo) {
                Storage::delete('public/' . str_replace('storage/', '', $project->project_photo));
            }

            // Upload file foto proyek
            $photoPath = $request->file('project_photo')->store('projects', 'public');
            $project->project_photo = 'storage/' . $photoPath;
        }

        // Update data proyek
        $project->update([
            'project_name' => $validated['project_name'],
            'project_description' => $validated['project_description'],
            'project_service' => $validated['project_service'],
            'project_link' => $validated['project_link'] ?? $project->project_link,
        ]);

        // Redirect ke halaman manage-project dengan pesan sukses
        return redirect()->route('manage-project')->with('success', 'Project updated successfully!');
    } catch (\Exception $e) {
        // Redirect ke halaman manage-project dengan pesan error
        return redirect()->route('manage-project')->with('error', 'Failed to update project: ' . $e->getMessage());
    }
}



    // Menghapus service berdasarkan ID
    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('manage-project')->with('success', 'Service deleted successfully!');
    }
}
