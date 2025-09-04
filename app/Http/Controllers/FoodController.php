<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function showAllCategories(){
        $categories = FoodCategory::with(['foods.price'])
        // ->where('category_name','dinner')
        ->get();


        return view('dining', compact('categories'));
    }

    public function getItemsByCategory($id){

        $category = FoodCategory::with(['foods.price'])->find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        // dd($category);

        return response()->json([
            'category_name' => $category->category_name,
            'foods' => $category->foods->map(function ($food) {
                return [
                    'id' => $food->id,

                    'food_name' => $food->food_name,
                    'description' => $food->description,
                    'image_path' => $food->image_path,
                    'price' => $food->price ? $food->price->price : null,
                ];
            })
        ]);
    }
}
