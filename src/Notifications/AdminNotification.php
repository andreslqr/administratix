<?php

namespace Administratix\Administratix\Notifications;

use Administratix\Administratix\Mail\AdminMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;

class AdminNotification extends Notification
{
    use Queueable;

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
     * Create a new notification instance.
     */
    public function __construct($title, $content, $action = null, $type = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->action = $action;
        $this->type = $type ?: Arr::first(array_keys(config('administratix.notifications.types')));
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return config('administratix.notifications.via');
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): Mailable
    {
        return new AdminMail($this->title, $this->content, $this->action, $this->type);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'action' => $this->action,
            'type' => $this->type
        ];
    }
}