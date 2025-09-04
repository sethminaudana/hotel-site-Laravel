<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomOther extends Model
{
    protected $fillable = [
        'feature_name', 'detail_id'
    ];
    protected $table = 'room_other';
    public function detail(){
        return $this->belongsTo(RoomDetail::class.'detail_id');
    }
}
