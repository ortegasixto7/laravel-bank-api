<?php

namespace App\Core\User;

class UserPersistence implements IUserPersistence
{

    function create(User $data): void
    {
        $table = new UserModel();
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

        $user = new User();
        $user->id = $result->id;
        $user->firstName = $result->first_name;
        $user->lastName = $result->last_name;
        $user->userName = $result->user_name;
        $user->createdAt = $result->created_at;
        return $user;
    }
}
