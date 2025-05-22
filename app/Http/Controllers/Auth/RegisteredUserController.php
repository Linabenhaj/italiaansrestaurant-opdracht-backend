<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    // Toon registratieformulier door get 
    public function create()
    {
        return view('auth.register'); 
    }
    // Verwerk registratie door post te gebruiken
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->createUser($request->all());

        auth()->login($user);

        return redirect()->route('dashboard'); 
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'birthday' => ['nullable', 'date'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'about' => ['nullable', 'string', 'max:1000'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function createUser(array $data)
    {
        $path = null;
        if (request()->hasFile('profile_picture')) {
            $path = request()->file('profile_picture')->store('profile_pictures', 'public');
        }
        return User::create([
            'username' => $data['username'],
            'birthday' => $data['birthday'] ?? null,
            'profile_picture' => $path,
            'about' => $data['about'] ?? null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
