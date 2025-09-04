<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends Controller
{
    public function index()
{
    $mediaItems = Blog::latest()->get(); // Get all media
    return view('media.index', compact('mediaItems'));
}
     public function create()
    {
        return view('media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'image' => 'nullable|image|max:5048', // 5MB max
        ]);

        // Store image if uploaded
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

        // Save to DB
        Blog::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'video_url' => $validated['video_url'] ?? null,
            'image_path' => $imagePath,
        ]);

        // You can now save to database or debug
        return redirect()->back()->with('success', 'Media saved successfully!');
    }
    public function show($id)
    {
        $media = Blog::findOrFail($id);

        $previous = Blog::where('id', '<', $media->id)->orderBy('id', 'desc')->first();
        $next = Blog::where('id', '>', $media->id)->orderBy('id')->first();

        return view('blog_uploads', compact('media', 'previous', 'next'));
    }
    public function showcard()
    {
        $media = Blog::orderBy('id', 'asc')->get();

        // $previous = Blog::where('id', '<', $media->id)->orderBy('id', 'desc')->first();
        // $next = Blog::where('id', '>', $media->id)->orderBy('id')->first();

        return view('blog', compact('media'));
    }
    public function search(Request $request)
{
    // dd($request->all());
    $query = $request->input('query');

    //  $media = Blog::findOrFail(1);

   // $results = Blog::where('title', 'like', '%' . $query . '%')->where('created_at', 'like', '%' . $query . '%')->get();
    $results = Blog::where(function ($q) use ($query) {
        $q->where('title', 'like', '%' . $query . '%');

        // Try matching the date part (e.g., 2025-06-20)
        if (preg_match('/\d{4}-\d{2}-\d{2}/', $query)) {
            $q->orWhereDate('created_at', $query);
        }
    })->orderBy('id', 'asc')->get();
    return view('blog', compact('results', 'query'));
}
// public function lblog()
//     {
//         $media = Blog::all();

//         // $previous = Blog::where('id', '<', $media->id)->orderBy('id', 'desc')->first();
//         // $next = Blog::where('id', '>', $media->id)->orderBy('id')->first();

//         return view('blog_uploads', compact('media'));
//     }
//     public function sortbydate(Request $request)
// {    $sortOrder = $request->get('sort', 'desc'); // default to newest
//     // Sort by newest first
//     $media = Blog::orderBy('created_at', 'desc')->get();

//     return view('blog', compact('media'));
// }
}
