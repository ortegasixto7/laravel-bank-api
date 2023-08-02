<?php

namespace App\Exceptions;

class NotFoundException extends \Exception
{
    public function __construct(CustomError $error = CustomError::UNKNOWN_ERROR)
    {
        parent::__construct($error->name);
    }
}
