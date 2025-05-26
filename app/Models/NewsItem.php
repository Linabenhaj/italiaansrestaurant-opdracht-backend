<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    protected $fillable = ['title','content','published_at','image_path'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

   
public function tags()
{
    return $this->belongsToMany(Tag::class);
}

}
