<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = [
        'program_id',
        'recipient_name',
        'location',
        'amount',
        'notes',
        'photo_url',
        'distributed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'distributed_at' => 'datetime',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
