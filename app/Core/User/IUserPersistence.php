<?php

namespace App\Core\User;

interface IUserPersistence
{
    function create(User $data): void;
    function getByUserNameOrNull(string $userName): ?User;
}
