<?php

namespace App\Models;

use Illuminate\Model\Model;

class User extends Model
{
    protected $table = 'users';

    public function post()
    {
        return ['hasOne', 'user_id'];
    }
    public function test()
    {
        return ['hasMany', 'user_id', 'id'];
    }
    public function roles()
    {
        return ['belongsTo', 'role_id', 'id'];
    }
}