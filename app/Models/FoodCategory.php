<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function foods(){
        return $this->hasMany(Food::class,'category_id');
    }
}
