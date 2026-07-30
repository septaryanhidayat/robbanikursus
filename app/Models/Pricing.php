<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = ['type', 'level', 'price', 'period', 'notes', 'is_active', 'order'];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:0',
    ];
}
