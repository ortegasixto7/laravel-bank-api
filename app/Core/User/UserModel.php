<?php

namespace App\Core\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    public $incrementing = false;
    public $timestamps = false;
}
