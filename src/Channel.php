<?php

namespace tricciardi\UsenditSms;

use Illuminate\Notifications\Notification;

class Channel
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toUsendit($notifiable);

        if (is_string($message)) {
            $message = Message::create($message);
        }

        if ($to = $notifiable->routeNotificationFor('Usendit')) {
            $message->setRecipient($to);
        }

        $this->client->send($message);
    }
}
