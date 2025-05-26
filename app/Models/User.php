<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

     protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'birthday',
        'profile_picture',
        'about',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'date',
        'is_admin'          => 'boolean',
    ];

    public function isAdmin(): bool
{
    return $this->is_admin === 1
        || $this->user_type === 'admin';
}


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
