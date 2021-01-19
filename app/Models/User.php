<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = "id_user";
    public $timestamps = false;
    protected $fillable = [
        'name_user', 'email_user', 'password_user','admin_user',
    ];
    protected $hidden = [
        'password_user', 
    ];
}
