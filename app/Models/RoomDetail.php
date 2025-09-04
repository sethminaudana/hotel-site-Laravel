<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{

    protected $fillable = [
        'description', 'adult', 'gallery_images', 'room_id','child',
    ];
    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function features() {
        return $this->hasMany(RoomFeature::class, 'detail_id');
    }

    public function popularFeatures(){
        return $this->hasMany(RoomPopularFeature::class,'detail_id');
    }

    public function foodsAndDrinks(){
        return $this->hasMany(RoomFoodsDrink::class, 'detail_id');
    }

    public function bedsAndBlankets() {
        return $this->hasMany(RoomBedsBlanket::class, 'detail_id');
    }

    public function safetyAndSecurity(){
        return $this->hasMany(RoomSafetySecurity::class, 'detail_id');
    }

    public function media(){
        return $this->hasMany(RoomMedia::class,'detail_id');
    }

    public function bathroom(){
        return $this->hasMany(RoomBathroom::class,'detail_id');
    }

    public function other(){
        return $this->hasMany(RoomOther::class, 'detail_id');
    }

    public function amenities(){
        return $this->hasMany(RoomAmenity::class,'detail_id');
    }

    public function extraService(){
        return $this->hasMany(ExtraService::class, 'detail_id');
    }
}
