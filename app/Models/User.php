<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    
    protected $hidden = ['password'];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
