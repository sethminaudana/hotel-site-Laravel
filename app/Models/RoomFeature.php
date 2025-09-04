<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{

    protected $fillable = [
        'feature_name', 'detail_id'
    ];
    public function detail(){
        return $this->belongsTo(RoomDetail::class.'detail_id');
    }
}
