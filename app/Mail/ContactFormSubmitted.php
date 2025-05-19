<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

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

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuw bericht via contactformulier',
        );
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

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
