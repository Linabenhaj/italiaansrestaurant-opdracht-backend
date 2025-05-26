<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //allle binnekomde berichten voor de admin
    public function inbox()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.contact.inbox', compact('messages'));
    }

    //verwijderen van contactberichten
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()
            ->route('admin.contact.inbox')
            ->with('success', 'Bericht verwijderd.');
    }
}
