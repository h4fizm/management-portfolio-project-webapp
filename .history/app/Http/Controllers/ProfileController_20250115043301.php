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
        if (Auth::id() != $id) {
            return redirect()->route('profile.page')->with('error', 'Unauthorized action.');
        }

        $user = Auth::user();

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id), // Email harus unik kecuali untuk user ini
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ], [
            'email.unique' => 'The email address is already registered. Please use a different one.',
        ]);

        // Update user data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        if ($request->hasFile('resume')) {
            if ($user->upload_resume) {
                Storage::disk('public')->delete($user->upload_resume);
            }
            $user->upload_resume = $request->file('resume')->store('resumes', 'public');
        }

        $user->save();

        return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
    }

}