<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

     protected $fillable = [
    'name','username','email','password',
    'birthday','about','profile_picture',
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
        return $this->user_type === 'admin';
    }


    // onderaan de class
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
