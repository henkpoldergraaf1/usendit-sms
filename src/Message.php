<?php

namespace tricciardi\UsenditSms;

class Message
{
    public $body;
    public $originator;
    public $recipient;
    public $reference;

    public static function create($body = '')
    {
        return new static($body);
    }

    public function __construct($body = '')
    {
        if (!empty($body)) {
            $this->setBody($body);
        }
    }

    public function setBody($body)
    {
        $this->body = mb_convert_encoding(trim($body),'ISO-8859-1', 'UTF-8');

        return $this;
    }

    public function setOriginator($originator)
    {
        $this->originator = $originator;

        return $this;
    }

    public function setRecipient($recipient)
    {
        if (is_array($recipient)) {
            throw new \Exception('does not support multiple recipients');
        } else {
            $recipient = ltrim($recipient, '0');
        }

        $this->recipient = $recipient;

        return $this;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
    
    public function setDatacoding($datacoding)
    {
        $this->datacoding = $datacoding;

        return $this;
    }


    public function toJson()
    {
        return json_encode($this);
    }
}
