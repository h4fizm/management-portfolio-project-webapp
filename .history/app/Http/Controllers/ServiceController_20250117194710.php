<?php

namespace App\Http\Controllers;

use App\Models\Service; // Import model Service
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showManageServicePage()
    {
        try {
            // Urutkan data berdasarkan created_at, dan ambil 5 data per halaman
            $services = Service::orderBy('created_at', 'desc')->paginate(5);

            // Tampilkan view dengan data yang di-paginate
            return view('menu.manage-service', compact('services'));
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, log error dan kembalikan dengan pesan error
            \Log::error('Error fetching services: ' . $e->getMessage());

            return redirect()->back()->withErrors('Failed to load services. Please try again.');
        }
    }

    public function storeService(Request $request)
    {
        // Validasi input
        $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam database
        Service::create([
            'service_name' => $request->service_name,
        ]);

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('manage-service')->with('success', 'Service added successfully!');
    }

    // Menghapus service berdasarkan ID
    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('manage-service')->with('success', 'Service deleted successfully!');
    }
}
