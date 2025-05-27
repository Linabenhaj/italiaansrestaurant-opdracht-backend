<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //registratieform
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    //gegevens verwerken
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'username'         => 'required|string|max:255|unique:users',
            'email'            => 'required|email|max:255|unique:users',
            'password'         => ['required','confirmed', Password::defaults()],
            'birthday'         => 'nullable|date',
            'about'            => 'nullable|string',
            'profile_picture'  => 'nullable|image|max:2048',
        ]);


        //als profielfoto dan sla op
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profiles', 'public');
        }

        $user = User::create([
            'name'            => $data['name'],
            'username'        => $data['username'],
            'email'           => $data['email'],
            'password'        => Hash::make($data['password']),
            'birthday'        => $data['birthday'] ?? null,
            'about'           => $data['about'] ?? null,
            'profile_picture' => $data['profile_picture'] ?? null,
        ]);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('user.dashboard');
    }
}
