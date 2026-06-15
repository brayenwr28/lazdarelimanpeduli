<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'status',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
