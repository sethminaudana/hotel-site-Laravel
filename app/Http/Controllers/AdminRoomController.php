<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\RoomMedia;
use App\Models\RoomOther;
use App\Models\RoomDetail;
use App\Models\Reservation;
use App\Models\RoomAmenity;
use App\Models\RoomFeature;
use App\Models\ExtraService;
use App\Models\RoomBathroom;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Models\RoomFoodsDrink;
use App\Models\RoomBedsBlanket;
use App\Models\RoomPopularFeature;
use App\Models\RoomSafetySecurity;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminRoomController extends Controller
{
    public function manageRooms(){
        $allRooms = Room::all();
        $availableRooms = Room::where('status','available')->get();
        $unavailableRooms = Room::where('status','unavailable')->get();

        $totalCount = $allRooms->count();
        $availableCount = $availableRooms->count();
        $unavailableCount = $unavailableRooms->count();

        // show all the existing features
        $generalFeatures = RoomFeature::distinct()->pluck('feature_name');
        $popularFeatures = RoomPopularFeature::distinct()->pluck('feature_name');
        $bedsBlanketFeatures = RoomBedsBlanket::distinct()->pluck('feature_name');
        $foodsFeatures = RoomFoodsDrink::distinct()->pluck('feature_name');
        $safetyFeatures = RoomSafetySecurity::distinct()->pluck('feature_name');
        $mediaFeatures = RoomMedia::distinct()->pluck('feature_name');
        $bathroomFeatures = RoomBathroom::distinct()->pluck('feature_name');
        $amenityFeatures = RoomAmenity::distinct()->pluck('feature_name');
        $extraServiceFeatures = ExtraService::distinct()->pluck('service');
        $otherFeatures = RoomOther::distinct()->pluck('feature_name');


        return view('admin.manage-rooms', compact(
            'allRooms',
            'availableRooms',
            'unavailableRooms',
            'totalCount',
            'availableCount',
            'unavailableCount',
            'generalFeatures',
            'popularFeatures',
            'bedsBlanketFeatures',
            'foodsFeatures',
            'safetyFeatures',
            'mediaFeatures',
            'bathroomFeatures',
            'amenityFeatures',
            'extraServiceFeatures',
            'otherFeatures'
        ));



    }

    public function storeRoomDetails(Request $request){
        $request->validate([
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'adult' => 'required|integer',
            'child' => 'required|integer',
            'status' => 'required|in:available,unavailable',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', 
        ]);

        // if($request->hasFile('image_path')){
        //     $image = $request->file('image_path');

        //     $imageName = time() . '.' . $image->getClientOriginalExtension();

        //     $path = str_replace('\\', '/', public_path('rooms/'));
        //     if(!file_exists($path)){
        //         mkdir($path, 0755, true);
        //     }

        //     dd($path . $imageName);

        //     $image->save($path . $imageName);
        // }

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('rooms/');
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

            //$image->move($path, $imageName); // Use move() instead of save()

            // Save relative path like: rooms/1751513436.png
            $imagePath = 'rooms/' . $imageName;

            // dd($imagePath);
            // Now save $imagePath in the database
            // $image->save($imagePath);
        }

        // $imagePath = null;
        // if($request->hasFile('image_path')){
        //     $imagePath = $request->file('image_path')->store('rooms','public');
        // }
// dd($imagePath);
        $room = Room::create([
            'room_name' => $request->room_name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'image_path' => $imagePath, 
        ]);

        $roomDetail = RoomDetail::create([
            'description' => $request->description,
            'adult' => $request->adult,
            'child' => $request->child,
            'gallery_images' => json_encode([]),
            'room_id' => $room->id,
        ]);

        $this->storeFeatureList($roomDetail->id, $request->room_features, RoomFeature::class);
        $this->storeFeatureList($roomDetail->id, $request->popular_features, RoomPopularFeature::class);
        $this->storeFeatureList($roomDetail->id, $request->beds_features, RoomBedsBlanket::class);
        $this->storeFeatureList($roomDetail->id, $request->foods_features, RoomFoodsDrink::class);
        $this->storeFeatureList($roomDetail->id, $request->safety_features, RoomSafetySecurity::class);
        $this->storeFeatureList($roomDetail->id, $request->media_features, RoomMedia::class);
        $this->storeFeatureList($roomDetail->id, $request->bathroom_features, RoomBathroom::class);
        $this->storeFeatureList($roomDetail->id, $request->amenities_features, RoomAmenity::class);
        $this->storeFeatureList($roomDetail->id, $request->other_features, RoomOther::class);
        $this->storeFeatureList($roomDetail->id, $request->extra_services, ExtraService::class);

        return redirect()->back()->with('success','Room Added Successfully!!!');
    }

    private function storeFeatureList($detailId, $features, $model){
        if(!is_array($features)){
            return;
        }

        foreach($features as $feature){
            if($feature){
                $model::create([
                    'detail_id' => $detailId,
                    'feature_name' => $feature
                ]);
            }
        }

    }


    public function updateStatus(Request $request){
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|in:available,unavailable',
        ]);

        Room::where('id',$request->room_id)->update([
            'status' => $request->status
        ]);

        return back()->with('success','Room status updated');

    }

    public function show($id){

        $room = Room::with([
            'details.features',
            'details.popularFeatures',
            'details.bedsAndBlankets',
            'details.foodsAndDrinks',
            'details.safetyAndSecurity',
            'details.media',
            'details.bathroom',
            'details.amenities',
            'details.other',
        ])->findOrFail($id);
        $detail = $room->details;

        return response()->json([
            'room' => $room,
            'details' => $detail,
            'features' => [
                'general' => $detail->features,
                'popular' => $detail->popularFeatures,
                'beds' => $detail-> bedsAndBlankets,
                'foods' => $detail -> foodsAndDrinks,
                'safety' => $detail -> safetyAndSecurity,
                'media' => $detail -> media,
                'bathroom' => $detail-> bathroom,
                'amenities' => $detail-> amenities,
                'other' => $detail -> other,
            ]
        ]);

    }

    public function destroy($id){
        $room = Room::findOrFail($id);

        if($room->details){
            $room->details()->delete();
        }

        $room->delete();
        return response()->json(['success' => true, 'message' => 'Room deleted successfully.']);
    }


    public function edit($id){
        $room = Room::findOrFail($id);
        $detail = $room->details;

        $features = [
            'room_features' => $detail->features->pluck('feature_name'),
            'popular_features' => $detail->popularFeatures->pluck('feature_name'),
            'beds_features' => $detail->bedsBlanketFeatures->pluck('feature_name'),
            'foods_features' => $detail->foodsFeatures->pluck('feature_name'),
            'safety_features' => $detail->safetyFeatures->pluck('feature_name'),
            'media_features' => $detail->media->pluck('feature_name'),
            'bathdetail_features' => $detail->bathroom->pluck('feature_name'),
            'amenities_features' => $detail->amenities->pluck('feature_name'),
            'extra_services' => $detail->extraServices->pluck('feature_name'),
            'other_features' => $detail->other->pluck('feature_name'),
        ];

        return response()->json([
            'room' => $room,
            'details' => $detail,
            'features' => $features
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'adult' => 'required|integer',
            'child' => 'required|integer',
            'status' => 'required|string|in:available,unavailable',
            'image_path' => 'nullable|image|max:2048',
        ]);

        $room = Room::findOrFail($id);

        // Update main room info
        $room->room_name = $request->room_name;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->status = $request->status;

        
        // if ($request->hasFile('image_path')) {
        //     $image = $request->file('image_path');
        //     $path = $image->store('uploads/rooms', 'public');
        //     $room->image_path = 'storage/' . $path;
        // }



        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('rooms/');
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

            //$image->move($path, $imageName); // Use move() instead of save()

            // Save relative path like: rooms/1751513436.png
            $imagePath = 'rooms/' . $imageName;

            // dd($imagePath);
            // Now save $imagePath in the database
            // $image->save($imagePath);
        }

        $room->image_path = $imagePath;

        $room->save();

        // Clear and re-insert features
        // $this->syncFeatures($room, $request);

        return redirect('/manage-rooms');
    }


    private function syncFeatures(Room $room, Request $request)
    {
        $detail = $room->details;
        $detail->features()->delete();
        $detail->popularFeatures()->delete();
        $detail->bedsBlanketFeatures()->delete();
        $detail->foodsFeatures()->delete();
        $detail->safetyFeatures()->delete();
        $detail->mediaFeatures()->delete();
        $detail->bathroomFeatures()->delete();
        $detail->amenitiesFeatures()->delete();
        $detail->extraServiceFeatures()->delete();
        $detail->otherFeatures()->delete();

        $map = [
            'room_features' => RoomFeature::class,
            'popular_features' => RoomPopularFeature::class,
            'beds_features' => RoomBedsBlanket::class,
            'foods_features' => RoomFoodsDrink::class,
            'safety_features' => RoomSafetySecurity::class,
            'media_features' => RoomMedia::class,
            'bathroom_features' => RoomBathroom::class,
            'amenities_features' => RoomAmenity::class,
            'extra_services' => ExtraService::class,
            'other_features' => RoomOther::class,
        ];

        foreach ($map as $input => $model) {
            if ($request->has($input)) {
                $features = array_filter(array_map('trim', $request->input($input)));
                foreach ($features as $name) {
                    $model::create([
                        'detail_id' => $detail->id,
                        'feature_name' => $name
                    ]);
                }
            }
        }
    }


}
