<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\FoodCategory;
use App\Models\Offer;
use Illuminate\Http\Request;

class UseController extends Controller
{
    public function viewHome(){
        $rooms = Room::with('features')
                ->where('status','available')
                ->take(2)
                ->get();

        $categories = FoodCategory::with(['foods.price'])->get();

        // $offers = Offer::paginate(4); // Change 10 to how many items per page you want


        return view('home', compact('rooms','categories'));
    }

}
