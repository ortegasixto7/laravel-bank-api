<?php

namespace App\Core\User;

class UserPersistence implements IUserPersistence
{

    function create(User $data): void
    {
        $table = new UserModel();
        $table->id = $data->id;
        $table->first_name = $data->firstName;
        $table->last_name = $data->lastName;
        $table->user_name = $data->userName;
        $table->created_at = microtime(true) * 1000;
        $table->save();
    }

    function getByUserNameOrNull(string $userName): ?User
    {
        $result = UserModel::firstWhere('user_name', $userName);
        if (is_null($result)) return null;

        $data = new User();
        $data->id = $result->id;
        $data->firstName = $result->first_name;
        $data->lastName = $result->last_name;
        $data->userName = $result->user_name;
        $data->createdAt = $result->created_at;
        return $data;
    }
}
