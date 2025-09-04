<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['title', 'discount', 'description', 'image', 'valid_until', 'is_active'];

}
