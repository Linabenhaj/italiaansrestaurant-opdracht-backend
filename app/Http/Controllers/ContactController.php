<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //contactformulier tonen
    public function show()
    {
        return view('contact');
    }

    //verwerken ingegeven formulier
    public function submit(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // 1) Bewaar in database
    ContactMessage::create($data);

    // 2) Verstuur naar admin
    Mail::to('admin@ehb.be')
        ->queue(new ContactMessageMailable($data));

    return back()->with('success','Uw bericht is verzonden! De admin krijgt een e-mail.');
}
}
