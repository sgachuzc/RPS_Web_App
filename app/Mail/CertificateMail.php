<?php

namespace App\Mail;

use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Inscription;
use App\Models\Participant;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable implements ShouldQueue {
    
    use Queueable, SerializesModels;

    protected Certificate $certificate;
    protected Comment $comment;
    protected Participant $participant;
    protected Service $service;
    protected Inscription $inscription;

    public function __construct(
        Certificate $certificate,
        Comment $comment,
        Participant $participant,
        Service $service,
        Inscription $inscription
    ){
        $this->certificate = $certificate;
        $this->comment = $comment;
        $this->participant = $participant;
        $this->service = $service;
        $this->inscription = $inscription;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Te entregamos tu certificado',
        );
    }

    public function content(): Content {
        $url = url('/comments/'.$this->comment->token);
        return new Content(
            view: 'emails.certificate',
            with: [
                'certificate' => $this->certificate,
                'participant' => $this->participant,
                'service' => $this->service,
                'url' => $url
            ]
        );
    }

    public function attachments(): array {
        $logoPath = public_path('images/logo_black.png');

        $pdf = Pdf::loadView('certificates.pdf', [
            'certificate' => $this->certificate,
            'participant' => $this->participant,
            'service' => $this->service,
            'logoPath' => $logoPath
        ])->output();

        if (!$this->certificate->sent) {
            $this->certificate->sent = true;
            $this->certificate->save();
        }

        $this->inscription->participants()->updateExistingPivot($this->participant->id, [
            'certificated_sent' => true
        ]);

        // $this->participant->inscriptions()->updateExistingPivot($this->inscription->id, [
        //     'certificated_sent' => true,
        // ]);

        return [
            Attachment::fromData(
                fn() => $pdf,
                'certificado.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
