<?php

namespace App\Exceptions;

use Exception;

class NotFound extends Exception
{
    public int $statusCode;
    public function __construct(string $message, int $code = 404)
    {
        $this->message = $message ?? "Not Founded";
        $this->statusCode = $code;
    }
}
