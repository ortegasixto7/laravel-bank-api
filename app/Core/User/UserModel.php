<?php

namespace App\Core\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasUuids;

    protected $table = 'users';
    public $incrementing = false;
    public $timestamps = false;
}
