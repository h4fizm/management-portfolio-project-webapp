<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Pastikan ini ada untuk mendukung middleware
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman profil pengguna.
     */
    public function showProfilePage()
    {
        $user = Auth::user();
        return view('menu.profile', compact('user'));
    }

    /**
     * Menampilkan halaman kelola pengguna.
     */
    public function showManageUserPage()
    {
        $users = User::all();
        return view('menu.manage-user', compact('users'));
    }

    public function edit($id)
    {
        // Ambil user berdasarkan ID
        $user = User::findOrFail($id);
        // Jika ya, lanjutkan dan tampilkan halaman edit
        return view('menu.edit-profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id), // Mengabaikan pengecekan unik pada email user yang sedang diupdate
            ],
            'password' => 'nullable|min:8|confirmed',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, hash password dan update
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika ada file resume yang diupload, simpan file baru
        if ($request->hasFile('resume')) {
            // Hapus resume lama jika ada
            if ($user->upload_resume && Storage::exists('resumes/' . $user->upload_resume)) {
                Storage::delete('resumes/' . $user->upload_resume);
            }

            // Simpan file resume baru
            $fileName = time() . '_' . $request->file('resume')->getClientOriginalName();
            $request->file('resume')->storeAs('resumes', $fileName, 'public');
            $user->upload_resume = $fileName;
        }

        // Simpan perubahan ke database
        $user->save();

        // Pengalihan ke halaman edit profil dengan pesan sukses
        return redirect()->route('profile.edit', ['id' => $user->id])
            ->with('success', 'Profile updated successfully.');
    }



    /**
     * Mengupdate profil pengguna melalui halaman profil.
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya pemilik akun yang bisa mengupdate
        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.page')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('resume')) {
            if ($user->upload_resume && Storage::exists('resumes/' . $user->upload_resume)) {
                Storage::delete('resumes/' . $user->upload_resume);
            }

            $fileName = time() . '_' . $request->file('resume')->getClientOriginalName();
            $request->file('resume')->storeAs('resumes', $fileName, 'public');
            $user->upload_resume = $fileName;
        }

        $user->save();

        return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
    }
}
