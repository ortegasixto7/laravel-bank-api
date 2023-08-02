<?php

namespace App\External\Auth;


interface IAuthService
{
    function create(Auth $data): void;
    function getByUserNameOrNull(string $userName): ?Auth;
}
