<?php

namespace App\Exceptions;

use Exception;

class AlreadyExist extends Exception
{
    public int $statusCode;
    public function __construct(string $name, int $code = 409)
    {
        $this->message = ($name ?? "This content") . " already exists";
        $this->statusCode = $code;
    }
}
