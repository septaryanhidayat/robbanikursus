<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['title', 'description', 'badge_number', 'icon', 'is_active', 'order'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
