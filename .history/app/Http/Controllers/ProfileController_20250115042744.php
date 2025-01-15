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

    // Handle the profile update
    public function updateProfile(Request $request, $id)
    {
        // Ensure the authenticated user is updating their own profile
        if (Auth::id() != $id) {
            return redirect()->route('profile.page')->with('error', 'Unauthorized action.');
        }

        // Find the user
        $user = Auth::user();

       // Validate input
$request->validate([
    'name' => 'required|string|max:255',
    'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('users', 'email')->ignore($user->id), // Pastikan email tidak duplikat kecuali untuk user saat ini
    ],
    'password' => 'nullable|string|min:8|confirmed',
    'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
], [
    // Custom error message for unique email
    'email.unique' => 'The email address is already registered. Please use a different one.',
]);

// Jika validasi berhasil, lanjutkan
$user->name = $request->name;
$user->email = $request->email;

if ($request->filled('password')) {
    $user->password = bcrypt($request->password);
}

// Handle file upload
if ($request->hasFile('resume')) {
    if ($user->upload_resume) {
        Storage::disk('public')->delete($user->upload_resume);
    }
    $resumePath = $request->file('resume')->store('resumes', 'public');
    $user->upload_resume = $resumePath;
}

$user->save();

return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
