<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    //
    public function updateMap(Request $request)
{
    dd('get');
    $request->validate([
        'map_url' => 'required|string',
    ]);

    $iframe = $request->map_url;

    //Extract the url from the iframe's `src` attribute
    preg_match('/src="([^"]+)"/', $iframe, $matches);

    //use the matched URL or original input if no match
    $cleanUrl = $matches[1] ?? $iframe;

    // dd($cleanUrl);

    Setting::set('map_url', $cleanUrl);

    return back()->with('success', 'Map URL updated!');
}
}
