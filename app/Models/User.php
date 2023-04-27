<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const IS_USER = 'user';
    const IS_ADMIN = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'midname',
        'login',
        'role',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // full_name
    public function getFullNameAttribute() {
        return $this->surname . ' ' . $this->name;
    }

//    public function fullName() : Attribute {
//        return \Attribute::make(get: fn() => $this->surname . ' ' . $this->name)
//    }

    public function isAdmin(): bool
    {
        return (bool) $this->role == self::IS_ADMIN;
    }
}
