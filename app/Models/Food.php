<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'food_name', 'description', 'image_path', 'category_id', 'price_id'
    ];

    protected $table = 'foods';

    public function category(){
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }

    public function price(){
        return $this->belongsTo(FoodPrice::class, 'price_id');
    }
}
