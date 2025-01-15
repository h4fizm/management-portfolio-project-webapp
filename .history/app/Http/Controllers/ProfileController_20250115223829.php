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
        return view('menu.manage-user', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        // Check if the authenticated user is the same as the user being edited
        if (Auth::id() != $id) {
            return redirect()->route('profile.page')->with('error', 'Unauthorized action.');
        }

        $user = Auth::user();

        // If the request contains a file (resume upload)
        if ($request->hasFile('resume')) {
            // Validate the uploaded file
            $validatedData = $request->validate([
                'resume' => 'required|mimes:pdf,doc,docx|max:2048',  // Max size is 2MB
            ]);

            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();

            // Store the file in the "resumes" folder within the public disk
            $resume->storeAs('resumes', $resumeName, 'public');

            // Save the file name in the database
            $user->upload_resume = $resumeName;
            $user->save();

            // Redirect with success message after file upload
            return redirect()->route('profile.page')->with('success', 'Resume uploaded successfully!');
        }

        // Validate other profile data (name, email, and password)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),  // Ignore current user's email
            ],
            'password' => 'nullable|string|min:5|confirmed',
        ], [
            'email.unique' => 'The email address is already registered. Please use a different one.',
        ]);

        // Update user profile data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // If a password is provided, update it
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Save updated user data
        $user->save();

        // Redirect to profile page with success message after profile update
        return redirect()->route('profile.page')->with('success', 'Profile updated successfully.');
    }



}