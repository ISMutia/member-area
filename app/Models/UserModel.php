<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected $table = 'user';

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
