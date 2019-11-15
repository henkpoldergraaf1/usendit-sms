<?php

namespace tricciardi\Usendit\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    /**
     * @return static
     */
    public static function configurationNotSet()
    {
        return new static('In order to send notification via Usendit you need to add credentials in the `.env` file.');
    }
}
