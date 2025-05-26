<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile.show', compact('user'));
    }

    public function edit($username)
    {
        $user = Auth::user();

        // Alleen eigenaar of admin mag profiel aanpassen
        if ($user->username !== $username && !$user->isAdmin()) {
            abort(403);
        }

        // Haal ook de user op die aangepast wordt
        $profileUser = User::where('username', $username)->firstOrFail();

        return view('profile.edit', ['user' => $profileUser]);
    }

    public function update(Request $request, $username)
    {
        $user = Auth::user();

        // Check 
        if ($user->username !== $username && !$user->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date',
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Gebruik de juiste user om te updaten (niet perse Auth::user())
        $profileUser = User::where('username', $username)->firstOrFail();

        if ($request->hasFile('avatar')) {
            // Verwijder oude profielfoto indien aanwezig
            if ($profileUser->profile_picture && Storage::disk('public')->exists($profileUser->profile_picture)) {
                Storage::disk('public')->delete($profileUser->profile_picture);
            }

            // Upload nieuwe profielfoto
            $path = $request->file('avatar')->store('profile_pictures', 'public');
            $profileUser->profile_picture = $path;
        }

        $profileUser->username = $request->input('username');
        $profileUser->birthday = $request->input('birthday');
        $profileUser->about = $request->input('bio');
        $profileUser->save();

        return redirect()->route('profile.show', $profileUser->username)
                         ->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
