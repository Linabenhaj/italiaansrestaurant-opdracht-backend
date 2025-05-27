<?php

namespace App\Http\Controllers;

use App\Models\User;       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function dashboard()
{
    $user = auth()->user();
    return view('user.dashboard', compact('user'));
}

    
    public function index()
    {
        // Haal alle users op; je kunt hier eventueel filteren op 'active'
        $users = User::paginate(12);
        return view('users.index', compact('users'));
    }

   //detail gebruiker
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    // toon profiel
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Edit formulier
    public function edit()
{
    $user = auth()->user();
    return view('user.edit', compact('user'));
}

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
        $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $user->update($data);

    return redirect()->route('user.dashboard')->with('success', 'Profiel succesvol bijgewerkt.');
}

}

