<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
 public function build()
    {
        return $this->subject('Nieuw contactformulier bericht')
                    ->view('emails.contact_form_submitted');
    }
   
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', 
            with: [
                'data' => $this->data,
            ],
        );
    }

}
