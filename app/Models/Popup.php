<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'button_text',
        'button_url',
        'delay',
        'is_active'
    ];
}
