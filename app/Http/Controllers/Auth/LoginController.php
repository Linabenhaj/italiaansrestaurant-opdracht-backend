<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    //login met controlers op user en admin+ foutive gegevens
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            Log::info('Login gelukt voor gebruiker: ' . $user->email . ' (admin=' . ($user->is_admin ? 'ja' : 'nee') . ')');

            return $this->authenticated($request, $user);
        }

        return back()->withErrors([
            'email' => 'Deze gegevens kloppen niet.',
        ]);
    }

    //ziet wie admin en wie user en stuurt door
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            Log::info('Redirect naar admin.dashboard');
            return redirect()->route('admin.dashboard');
        }

        Log::info('Redirect naar user.dashboard');
        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
            Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
