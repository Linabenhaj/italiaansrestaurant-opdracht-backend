<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    // Dashboard voor ingelogde gebruikers
    public function dashboard()
    {
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }

    // Publiek profiel bekijken
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Formulier voor het bewerken van eigen profiel
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    // Profiel bijwerken
    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'birthday' => 'nullable|date',
            'about' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Oude verwijderen indien bestaand
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->update($data);

        return redirect()->route('user.dashboard')->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
