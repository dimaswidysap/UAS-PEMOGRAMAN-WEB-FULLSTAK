<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    //
    protected $fillable = [
        'name',
        'code',
        'category_id',
        'buiding',
        'floor',
        'capacity',
        'description',
        'image',
        'is_active',
        'open_time',
        'close_time',

    ];
}
