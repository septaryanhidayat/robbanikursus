<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'badge_color', 'is_active', 'order'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
