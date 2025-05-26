<?php

namespace App\Http\Controllers;

use App\Models\User;       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index()
    {
        $users = User::latest()->paginate(12);
        return view('profiles.index', compact('users'));
    }

    // toon profiel van eéén specifieke user
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
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
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    // Update de handler 
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'username'        => 'required|string|max:50|unique:users,username,'.$user->id,
            'email'           => 'required|email|unique:users,email,'.$user->id,
            'birthday'        => 'nullable|date',
            'about'           => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles','public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.show')
                         ->with('success','Profiel bijgewerkt.');
    }
}
