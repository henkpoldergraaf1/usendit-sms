<?php

namespace tricciardi\UsenditSms;

use Exception;
use tricciardi\Usendit\Exceptions\CouldNotSendNotification;

class Client
{
    /**
     * Send the Message.
     * @param Message $message
     */
    public function send(Message $message)
    {
        try {
            Facade::sendMessage($message);
        } catch (Exception $exception) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($exception);
        }
    }
}
