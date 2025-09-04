<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $offers = Offer::latest()->get();
        return view("admin.manage-offers",compact("offers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'discount' => 'required|integer|min:1|max:100',
        'description' => 'nullable|string',
        'valid_until' => 'nullable|date',
        'is_active' => 'boolean',
        'image ' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
    ]);


    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $path = public_path('offers/');
        if(!file_exists($path)){
            mkdir($path,0755,true);
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

        $imagePath = 'offers/' . $imageName;

    }

    Offer::create([
        'title' => $request->title,
        'discount' => $request->discount,
        'description' => $request->description,
        'valid_until' => $request->valid_until,
        'is_active' => $request->is_active,
        'image' => $imagePath,
    ]);

    return redirect()->route('manage-offers')->with('success', 'Offer created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string',
            'valid_until' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
         if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('offers', 'public');
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        Offer::update($validated);

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $offer = Offer::findOrFail($id);

    // Delete the image file if needed
    // if ($offer->image && file_exists(public_path('storage/' . $offer->image))) {
    //     unlink(public_path('storage/' . $offer->image));
    // }

    $offer->delete();

    return redirect()->back()->with('success', 'Offer deleted successfully.');
    }
//     public function homeindex()
// {
//     $offers = Offer::all();
//     return view('home', compact('offers'));
// }
}
