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

    // Handle file upload for FilePond
    public function uploadResume(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $resume = $request->file('file');
        $resumeName = time() . '_' . $resume->getClientOriginalName();
        $resume->storeAs('resumes', $resumeName, 'public');

        // Kembalikan nama file untuk ditangani oleh FilePond
        return response()->json(['file' => $resumeName], 200);
    }

    // Handle file revert for FilePond
    public function revertResume(Request $request)
    {
        $fileName = $request->getContent(); // FilePond mengirimkan nama file sebagai payload
        $filePath = 'public/resumes/' . $fileName;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        return response()->json(['message' => 'File reverted successfully'], 200);
    }
}
