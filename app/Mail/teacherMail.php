<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class teacherMail extends Mailable
{
    use Queueable, SerializesModels;
    private Message $message ;
    /**
     * Create a new message instance.
     */
    public function __construct( Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
       

        return new Content(
            view: 'emails.become_teacher',
            with:[
                'email' => $this->message->email,
                'name' => $this->message->name,
                'phone' => $this->message->phone,
                'messages'=>$this->message->messages,
            ]

        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
