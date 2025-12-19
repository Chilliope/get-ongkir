<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    public $incrementing = false; 
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];
}
