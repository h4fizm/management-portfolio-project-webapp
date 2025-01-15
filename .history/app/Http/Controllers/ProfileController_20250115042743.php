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

       