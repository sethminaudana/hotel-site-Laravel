<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutusImg;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function updateImg(Request $request)
{
    $setting = AboutusImg::first() ?? new AboutusImg();

    if ($request->hasFile('welcome_image')) {
        $welcomePath = $request->file('welcome_image')->store('home', 'public');
        $setting->welcome_image = $welcomePath;
    }

    if ($request->hasFile('background_image')) {
        $bgPath = $request->file('background_image')->store('home', 'public');
        $setting->background_image = $bgPath;
    }

    $setting->save();

    return redirect()->back()->with('success', 'Images updated successfully!');
}
}
