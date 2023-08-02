<?php

namespace App\External\Auth;


interface IAuthService
{
    function create(Auth $data): string;
    function getByUserNameOrNull(string $userName): ?Auth;
}
