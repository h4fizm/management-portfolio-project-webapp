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

}
