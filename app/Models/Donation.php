<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'program_id',
        'donation_code',
        'donor_name',
        'donor_email',
        'donor_phone',
        'campaign_category',
        'amount',
        'payment_method',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
