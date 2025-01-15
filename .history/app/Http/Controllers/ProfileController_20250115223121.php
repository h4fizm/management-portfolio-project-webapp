<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    // Show the profile page
    public function showProfilePage()
    {
        $user = Auth::user();
        return view('menu.profile', compact('user'));
    }
    public function showManageUserPage()
    {
        $user = Auth::user();
        return view('menu.', compact('user'));
    }

    // Handle the profile update
    public function updateProfile(Request $request, $id)
    {
        if (Auth::id() != $id) {
            return redirect()->route('profile.page')->with('error', 'Unauthorized action.');
        }

        $user = Auth::user();

        // Jika ini permintaan Dropzone (AJAX upload file)
        if ($request->hasFile('resume')) {
            $validatedData = $request->validate([
                'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();
            $resume->storeAs('resumes', $resumeName, 'public');

            // Simpan nama file di database
            $user->upload_resume = $resumeName;
            $user->save();

            // Arahkan ke halaman profil dengan pesan sukses
            return redirect()->route('profile.page')->with('success', 'Resume uploaded successfully!');
        }

        // Validasi input lainnya
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:5|confirmed',
        ], [
            'email.unique' => 'The email address is already registered. Please use a different one.',
        ]);

        // Update data user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
    }


}