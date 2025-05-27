<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    /**
     * De attributen die mass-toewijsbaar zijn.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'image_path',
    ];

   //meerdere pizza's per bestelling!
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
