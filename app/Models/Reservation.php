<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'room_id', 'checkin_datetime', 'checkout_datetime',
         'adult', 'child',
        'mealPlan', 'price', 'status','is_read','booking_code','mealPrice','roomPrice','numDays',
    ];

    public function user(){
        return $this->belongsTo(ReservationUser::class,'user_id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
