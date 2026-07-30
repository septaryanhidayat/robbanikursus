<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'student_name',
        'parent_name',
        'phone_number',
        'education_level',
        'program_type',
        'selected_subjects',
        'address',
        'notes',
        'status',
    ];
}
