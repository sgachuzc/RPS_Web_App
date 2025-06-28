<?php

namespace App\Mail;

use App\Models\Certificate;
use App\Models\Comment;
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

    public function __construct(
        Certificate $certificate,
        Comment $comment,
        Participant $participant,
        Service $service
    ){
        $this->certificate = $certificate;
        $this->comment = $comment;
        $this->participant = $participant;
        $this->service = $service;
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
        $pdf = Pdf::loadView('certificates.pdf', [
            'certificate' => $this->certificate,
            'participant' => $this->participant,
            'service' => $this->service,
        ])->output();

        if (!$this->certificate->sent) {
            $this->certificate->sent = true;
            $this->certificate->save();
        }

        return [
            Attachment::fromData(
                fn() => $pdf,
                'certificado.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
