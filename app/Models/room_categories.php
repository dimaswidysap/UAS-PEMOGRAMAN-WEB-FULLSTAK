<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room_categories extends Model
{
    //
     protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
        'description',
        'max_boxing_days_ahead',
        'max_duration_hours',
        'min_duration_minutes',
        'requires_approval',
        'sort_order',

    ];
}
