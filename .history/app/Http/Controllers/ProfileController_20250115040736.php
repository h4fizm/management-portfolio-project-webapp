<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    // Show the profile page
    public function showProfilePage()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Pass the user data to the profile page
        return view('menu.profile', compact('user'));
    }

    // Handle the profile update
    public function updateProfile(Request $request)
    {
        // Log the incoming request
        \Log::info('Profile update request:', $request->all());

        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // If password is provided, hash and update it
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Handle the resume file upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumePath = $resume->store('resumes', 'public');
            $user->upload_resume = $resumePath;
        }

        // Save the updated user data
        $user->save();

        // Log the update
        \Log::info('Profile updated successfully for user:', [$user->id]);

        return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
    }
}
