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
            'birthday' => 'nullable|date',
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('profile.show', $user->username)->with('success', 'Profile updated.');
    }
}
