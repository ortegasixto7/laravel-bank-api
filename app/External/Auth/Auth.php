<?php

namespace App\External\Auth;

use Illuminate\Support\Str;

class Auth
{
    public string $id;
    public string $userName;
    public string $password;
    public array $roles;
    public int $createdAt;

    public function __construct()
    {
        $this->id = (string) Str::uuid();
        $this->roles = [AuthRole::USER->value];
    }
}
