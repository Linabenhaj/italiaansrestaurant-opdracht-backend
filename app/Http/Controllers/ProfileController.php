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
        if ($user->username !== $username && !$user->is_admin) {
            abort(403);
        }
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = Auth::user();
        if ($user->username !== $username && !$user->is_admin) {
            abort(403);
        }

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'birthdate' => 'nullable|date',
            'about_me' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Verwijder oude profielfoto als die er is
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            // Upload nieuwe foto in profile_pictures folder
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->username = $request->username;
        $user->birthdate = $request->birthdate;
        $user->about_me = $request->about_me;
        $user->save();

        return redirect()->route('profile.show', $user->username)->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
