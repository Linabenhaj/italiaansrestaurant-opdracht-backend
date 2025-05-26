<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    //dashboard voor ingelogde gebruikers
     public function userDashboard()
    {
        $user = auth()->user();
        return view('admin.user.dashboard', compact('user'));
    }
//profiel ingelogde gebruiker
    public function profile()
    {
        $user = Auth::user();
        return view('admin.user.profile', compact('user'));
    }

    //formulier om profiel te bewerken 
    public function edit($username)
    {
        $user = Auth::user();
        // Ligt in resources/views/admin/user/edit.blade.php
        return view('admin.user.edit', compact('user'));
    }

  //opslaan bewerkte profiel
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'username'        => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'           => 'required|email|max:255|unique:users,email,' . $user->id,
            'birthday'        => 'nullable|date',
            'about'           => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $user->username = $data['username'];
        $user->email    = $data['email'];
        $user->birthday = $data['birthday'] ?? null;
        $user->about    = $data['about'] ?? null;

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Profiel succesvol bijgewerkt!');
    }
}
