<?php

namespace App\External\Auth;

enum AuthRole : int
{
    case ADMIN = 1;
    case USER = 2;
}
