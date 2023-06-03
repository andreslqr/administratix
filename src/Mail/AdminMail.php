<?php

namespace Administratix\Administratix\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The title of the notification
     * 
     * @var string
     */
    public $title;

    /**
     * The content of the notification
     * 
     * @var string
     */
    public $content;

    /**
     * The action of the button
     * 
     * @var string
     */
    public $action;

    /**
     * The type of the notification
     * 
     * @var string
     */
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($title, $content, $action = null, $type = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->action = $action;
        $this->type = $type ?: Arr::first(array_keys(config('administratix.notifications.types')));
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'x-admin::mail.index',
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