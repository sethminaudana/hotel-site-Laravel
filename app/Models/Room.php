<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name', 'price','description','image_path'
    ];

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function details(){
        return $this->hasOne(RoomDetail::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class,'room_id');
    }
}
