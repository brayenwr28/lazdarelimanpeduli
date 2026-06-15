<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'image_url',
        'category',
        'is_active',
        'end_date',
        'bank_name',
        'bank_account',
        'bank_account_name',
        'qris_image_url'
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
