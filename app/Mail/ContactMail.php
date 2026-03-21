<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    // Déclaration des variables publiques qui seront
    // automatiquement disponibles dans votre template Blade
    public $name;

    public $email;

    public $subject;

    public $messageContent; // <-- Correspond à votre template

    /**
     * Create a new message instance.
     * $data vient du HomeController (les données validées)
     */
    public function __construct(array $data)
    {
        // On assigne les données du contrôleur aux variables publiques
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->subject = $data['subject'];

        // CORRECTION : On mappe 'message' (du contrôleur)
        // à 'messageContent' (du template)
        $this->messageContent = $data['message'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [new Address($this->email, $this->name)],
            subject: '📧 Portfolio - '.$this->subject,
        );
    }

    /**
     * Get the message content definition.
     * Pointez vers votre template HTML
     */
    public function content(): Content
    {
        return new Content(
            // Pointez vers le fichier que vous avez créé à l'étape 1
            view: 'emails.contact-html',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
