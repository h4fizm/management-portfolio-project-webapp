<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfilePage()
    {
        return view('menu.profile');
    }
    public function showManageUserPage()
    {
        return view('menu.manage-user');
    }
}
