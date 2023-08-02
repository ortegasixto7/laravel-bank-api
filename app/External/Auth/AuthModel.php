<?php

namespace App\External\Auth;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    protected $table = 'auth';
    public $incrementing = false;
    public $timestamps = false;
}
