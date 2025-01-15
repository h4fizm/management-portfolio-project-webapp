<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the profile page
    public function showProfilePage()
    {
        $user = Auth::user();
        return view('menu.profile', compact('user'));
    }
    public function showManageUserPage()
    {
        $users = User::all(); // Mengambil semua data pengguna dari tabel `users`
        return view('menu.manage-user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user); // Pastikan Policy `update` sudah ada
        return view('edit-profile', compact('user'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
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

        return redirect()->route('profile.edit', ['id' => $id])
            ->with('success', 'Profile updated successfully.');
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