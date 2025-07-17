<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue {
    use Queueable, SerializesModels;

    protected Contact $contact;

    public function __construct(
        Contact $contact
    ){
        $this->contact = $contact;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Mensaje nuevo',
        );
    }

    public function content(): Content {
        $contact = $this->contact;
        return new Content(
            view: 'emails.contact',
            with: [
                'contact' => $contact
            ]
        );
    }

    public function attachments(): array {
        return [];
    }
}
