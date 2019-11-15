<?php
namespace tricciardi\UsenditSms;

class Facade
{
    public static function sendMessage(Message $message)
    {
        UsenditSms::sms($message->recipient, $message->body);
    }
}