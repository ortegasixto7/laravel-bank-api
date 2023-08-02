<?php

namespace App\External\Auth;

use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{

    function create(Auth $data): void
    {
        $table = new AuthModel();
        $table->id = $data->id;
        $table->user_name = $data->userName;
        $table->password = Hash::make($data->password);
        $table->roles = implode(",", $data->roles);
        $table->created_at = microtime(true) * 1000;
        $table->save();
    }

    function getByUserNameOrNull(string $userName): ?Auth
    {
        $result = AuthModel::firstWhere('user_name', $userName);
        if (is_null($result)) return null;

        $data = new Auth();
        $data->id = $result->id;
        $data->userName = $result->user_name;
        $data->password = $result->password;
        $data->roles = $result->roles;
        $data->createdAt = $result->created_at;
        return $data;
    }
}
