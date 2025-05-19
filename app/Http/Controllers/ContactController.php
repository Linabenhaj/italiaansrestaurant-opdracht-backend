<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Laat het contactformulier zien
    public function show()
    {
        return view('contact.form');
    }

    // Verwerk de data van formulier
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Mail sturen naar admin of jezelf
        Mail::to('jouw-email@example.com')->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Bedankt voor je bericht! We nemen snel contact op.');
    }
}
