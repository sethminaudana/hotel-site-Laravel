<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
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
        })->get();
        return view('admin.manage-blogs', compact('results', 'query'));
    }


        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // 3MB max
        ]);


        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('blogs/');
            if(!file_exists($path)){
                mkdir($path, 0755, true);
            }

            $image->move($path, $imageName);

            $imagePath = 'blogs/' . $imageName;

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


}
