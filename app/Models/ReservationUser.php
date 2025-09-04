<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationUser extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'nic', 'number'
    ];


    public function reservations(){
        return $this->hasMany(Reservation::class,'user_id');
    }
}
