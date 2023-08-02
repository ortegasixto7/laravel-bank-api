<?php

namespace App\Exceptions;

enum CustomError
{

    // Required Errors
    case FIRST_NAME_IS_REQUIRED;
    case LAST_NAME_IS_REQUIRED;
    case USER_NAME_IS_REQUIRED;
    case PASSWORD_NAME_IS_REQUIRED;

    // Exceptions
    case INVALID_USER_NAME;
    case UNKNOWN_ERROR;

}
