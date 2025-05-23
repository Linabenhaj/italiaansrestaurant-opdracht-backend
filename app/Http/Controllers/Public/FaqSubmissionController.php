<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FaqSubmissionController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'question' => 'required|string',
        ]);

        Mail::raw("Nieuwe FAQ vraag van: {$request->email}\n\nVraag:\n{$request->question}", function ($message) {
            $message->to('admin@ehb.be')
                    ->subject('Nieuwe FAQ inzending');
        });

        return redirect()->back()->with('success', 'Je vraag werd verzonden naar de administrator.');
    }
}
