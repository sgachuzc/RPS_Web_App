<?php

namespace App\Mail;

use App\Helpers\InscriptionsHelper;
use App\Models\Inscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionRegistration extends Mailable {
    
    use Queueable, SerializesModels;
    protected Inscription $inscription;
    protected InscriptionsHelper $inscriptionsHelper;

    public function __construct(
        Inscription $inscription,
        InscriptionsHelper $inscriptionsHelper
    ){
        $this->inscription = $inscription;
        $this->inscriptionsHelper = $inscriptionsHelper;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Registro del curso',
        );
    }

    public function content(): Content {
        $url = $this->inscriptionsHelper->generateRegistrationLink($this->inscription);
        return new Content(
            view: 'emails.registration_link',
            with: [
                'url' => $url,
                'inscription' => $this->inscription
            ]
        );
    }

    public function attachments(): array {
        return [];
    }
}
