<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const REMEMBER_TOKEN = 'remember_token';
    const EMAIL_VERIFIED_AT = 'email_verified_at';

    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
        self::PASSWORD => 'hashed',
    ];
}
