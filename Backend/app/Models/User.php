<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'last_name', 'email', 'password', 'dob', 'gender', 'google_id', 'auth_provider'];
    public $timestamps = true;
}
