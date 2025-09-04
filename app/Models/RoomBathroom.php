<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBathroom extends Model
{
    protected $fillable = [
        'feature_name', 'detail_id'
    ];
    protected $table = 'room_bathroom';
    public function detail(){
        return $this->belongsTo(RoomDetail::class.'detail_id');
    }
}
