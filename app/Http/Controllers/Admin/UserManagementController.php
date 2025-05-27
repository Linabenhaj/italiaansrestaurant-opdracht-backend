<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    // toon alle gebruikers gellimiteerd aan 10 want ik vindt het overzichtelijker
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    //formulier niueuwe gebruiker
    public function create()
    {
        return view('admin.users.create');
    }

    //opslaan nieuwe gebruiker
   public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'profile_picture' => 'nullable|image|max:2048',
    ]);

    $data['password'] = bcrypt($data['password']);
    $data['is_admin'] = $request->has('is_admin'); // ✅ sla checkbox op als boolean

    if ($request->hasFile('profile_picture')) {
        $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    User::create($data);

    return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt.');
}



    //bestaande gebruiker bewerken form
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    //bewerken
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:255',
            'username'        => 'required|string|max:50|unique:users,username,' . $user->id,
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'password'        => 'nullable|string|min:8|confirmed',
            'is_admin'        => 'sometimes|boolean',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        // Oude foto verwijderen en nieuwe uploaden
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $file     = $request->file('profile_picture');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $user->profile_picture = $file->storeAs('profiles', $filename, 'public');
        }

        // Basisgegevens bijwerken
        $user->name     = $data['name'];
        $user->username = $data['username'];
        $user->email    = $data['email'];
        if (! empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->is_admin = ! empty($data['is_admin']);
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker bijgewerkt.');
    }

    //verwijderen van een gebruiker
    public function destroy(User $user)
    {
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker verwijderd.');
    }

    //een gebruiker tot admin verheffen!
    public function promote(User $user)
    {
        $user->update(['is_admin' => true]);

        return back()->with('success', 'Gebruiker gepromoveerd tot admin.');
    }

    //admin-rechten weghalen
    public function demote(User $user)
    {
        $user->update(['is_admin' => false]);

        return back()->with('success', 'Admin-status ingetrokken.');
    }
}
