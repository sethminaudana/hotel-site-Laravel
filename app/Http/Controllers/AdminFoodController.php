<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Food;
// use Nette\Utils\Image;
use App\Models\FoodPrice;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
class AdminFoodController extends Controller
{
    public function showAllFoods(){
        $categories = FoodCategory::with(['foods.price'])->get();

        $totalCategories = $categories->count();
        $totalFoods = Food::count();

        return view('admin.manage-foods', compact(
            'categories',
            'totalCategories',
            'totalFoods'));
    }

    public function store(Request $request){
        $request->validate([
            'foodName' => 'required|string|max:100',
            'foodDescription' => 'required|string|max:200',
            'foodPrice' => 'required|numeric|min:0',
            'foodImage' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'category' => 'required|string|max:255',
        ]);

        

        if ($request->hasFile('foodImage')) {
            $image = $request->file('foodImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('foods/');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $imageSize = $image->getSize();

            if($imageSize > 1048576){
                $manager = new ImageManager(new Driver());

                $compressedImage = $manager->read($image->getPathname())
                ->resize(2100, null, function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->toJpeg(70);

                file_put_contents($path . $imageName, $compressedImage);
            }else{
                $image->move($path, $imageName);
            }



            // Save relative path like: rooms/1751513436.png
            $imagePath = 'foods/' . $imageName;

        }
        // dd($imagePath);

        //check or create category
        $category = FoodCategory::firstOrCreate(['category_name' => $request->category]);

        //create orice entry
        $price = FoodPrice::create(['price' => $request->foodPrice]);

        //create food item
        Food::create([
            'food_name'=> $request->foodName,
            'description' => $request->foodDescription,
            'image_path' => $imagePath,
            'category_id' => $category->id,
            'price_id' => $price->id,
        ]);

        return redirect()->back()->with('success', 'Food item added successfully!');

    }

    public function destroy($id){
        $food = Food::findOrFail($id);

        $foodPrice = $food->price;
        if($foodPrice){
            $foodPrice->delete();
        }

        // if ($food->image_path && \Storage::disk('public')->exists($food->image_path)) {
        //     \Storage::disk('public')->delete($food->image_path);
        // }

        $food->delete();

        return redirect()->back()->with('success','Food item deleted successfully.');


    }
}
