<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //Toon het dashboard of profiel van de ingelogde gebruiker
    public function index()
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Geef het profiel-view terug met de gebruiker
        return view('dashboard.profile', compact('user'));
    }
}
