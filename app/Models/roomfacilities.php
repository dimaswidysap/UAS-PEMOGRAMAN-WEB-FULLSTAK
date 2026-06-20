<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\rooms;


class roomfacilities extends Model
{
    //
    protected $table = 'room_facilities';
    protected $fillable = ['room_id', 'name', 'quantity', 'condition'];


    public function roomName(){
        return $this->belongsTo(rooms::class,'id');
    }

    public function room() {
        return $this->belongsTo(rooms::class);
    }
}
