<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'province_id',
        'name',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
