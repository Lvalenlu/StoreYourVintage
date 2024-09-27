<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UsersCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    // Propiedades públicas para almacenar el código y el email
    public $code;
    public $email;

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @param string $code Código de confirmación
     * @param string $email Correo electrónico del usuario
     */
    public function __construct($code, $email)
    {
        // Asigna el código y el email proporcionados a las propiedades públicas
        $this->code = $code;
        $this->email = $email;
    }

    /**
     * Obtiene el sobre (envelope) del mensaje.
     */
    public function envelope(): Envelope
    {
        // Retorna un nuevo sobre con el asunto 'Confirmacion de Cuenta'
        return new Envelope(
            subject: 'Confirmacion de Cuenta',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        // Retorna el contenido utilizando la vista 'emails.createUsers'
        return new Content(
            view: 'emails.createUsers',
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
