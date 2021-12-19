<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected $table = 'user';

    protected $fillable = [
        'fullname',
        'date_birth',
        'email',
        'password',
        'status',
        'contact_wa',
        'address',
    ];


    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'gambar_url'

    ];

    public function getGambarUrlAttribute()
    {
        return ($this->gambar) ? asset('storage/avatar/' . $this->gambar) : null;
    }
}
