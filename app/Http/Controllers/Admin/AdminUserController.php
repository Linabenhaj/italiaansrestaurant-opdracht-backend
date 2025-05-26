<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $validated['is_admin'] ?? false,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt!');
    }

    public function promote(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker gepromoveerd tot admin.');
    }

    public function demote(User $user)
    {
        $user->update(['is_admin' => false]);
        return redirect()->route('admin.dashboard')->with('success', 'Admin status ingetrokken.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd.');
    }
}
