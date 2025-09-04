<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomSafetySecurity extends Model
{
    protected $fillable = [
        'feature_name', 'detail_id'
    ];
    protected $table = 'room_safety_security';
    public function detail(){
        return $this->belongsTo(RoomDetail::class.'detail_id');
    }
}
