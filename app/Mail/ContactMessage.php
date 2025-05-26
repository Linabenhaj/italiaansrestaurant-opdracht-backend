<?php

namespace App\Mail;
use App\Mail\ContactMessage;   
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage as ContactMessageModel; 
class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->subject($this->data['subject'] ?? 'Nieuw contactbericht')
            ->view('emails.contact')
            ->with('data', $this->data);
    }
}
