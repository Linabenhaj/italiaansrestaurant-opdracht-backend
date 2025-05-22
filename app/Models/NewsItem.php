<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class NewsItem extends Model
{
    
    protected $fillable = ['title', 'image', 'content', 'published_at'];
    protected $dates = ['published_at'];
}
