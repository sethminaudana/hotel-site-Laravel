<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodPrice extends Model
{
    protected $fillable = [
        'price'
    ];

    public function foods(){
        return $this->hasMany(Food::class,'price_id');
    }
}
