<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;

    public function __construct(ContactMessage $message)
    {
        $this->messageData = $message;
    }

    public function build()
    {
        return $this
            ->subject('Nieuw contactformulierbericht')
            ->view('emails.contact-form')
            ->with(['data' => $this->messageData]);
    }
}
