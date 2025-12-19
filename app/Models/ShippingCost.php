<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    protected $fillable = [
        'origin',
        'destination',
        'weight',
        'courier',
        'data',
        'expired_at'
    ];

    protected $casts = [
        'data' => 'array', 
        'expired_at' => 'datetime'
    ];
}
