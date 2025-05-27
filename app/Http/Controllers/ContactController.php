<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactFormSubmitted;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Bewaar in database
        $message = ContactMessage::create($data);

        // Verstuur e-mail naar admin
        Mail::to(config('mail.admin', 'admin@ehb.be'))
            ->queue(new ContactFormSubmitted($message));

        return back()->with('success', 'Uw bericht is verzonden!');
    }
}
