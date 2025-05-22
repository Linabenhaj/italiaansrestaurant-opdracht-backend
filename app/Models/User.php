<?php 

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
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

    /**
     * Velden die automatisch gecast worden.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
        'is_admin' => 'boolean',
    ];

    /**
     * De gebruiker kan meerdere bestellingen hebben.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
