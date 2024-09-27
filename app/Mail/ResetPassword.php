<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Crea una nueva instancia del mensaje.
     */
    public $code;

    public function __construct($code)
    {
        // Asigna el código proporcionado al atributo público $code
        $this->code = $code;
    }

    /**
     * Obtiene el sobre (envelope) del mensaje.
     */
    public function envelope(): Envelope
    {
        // Retorna un nuevo sobre con el asunto 'Reset Password'
        return new Envelope(
            subject: 'Reset Password',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        // Retorna el contenido utilizando la vista 'emails.resetPassword'
        return new Content(
            view: 'emails.resetPassword',
        );
    }

    /**
     * Obtiene los archivos adjuntos del mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // No se adjuntan archivos, retorna un array vacío
        return [];
    }
}
