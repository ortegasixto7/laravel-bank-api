<?php

namespace App\Exceptions;

class BadRequestException extends \Exception
{
    public function __construct(CustomError $error = CustomError::UNKNOWN_ERROR)
    {
        parent::__construct($error->name);
    }
}
