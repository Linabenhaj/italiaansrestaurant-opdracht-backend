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

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->about_me = $request->about_me;

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete('public/' . $user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('profile.show', $user->username)->with('success', 'Profiel bijgewerkt!');
    }
}
