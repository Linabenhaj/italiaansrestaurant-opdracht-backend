<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //loginformulier tonen
    public function showLoginForm()
    {
        return view('auth.login');
    }

   //login de gebruiker
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Probeer in te loggen
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Afhankelijk van rol doorsturen naar juiste dashboard
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        // Foutmelding en behoud e-mail
        return back()
            ->withErrors(['email' => 'Deze gegevens komen niet overeen met onze records.'])
            ->onlyInput('email');
    }

    //Uitloggen gebruiker
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
