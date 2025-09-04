<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    //
    public function submitForm(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after_or_equal:checkin',
            'guests' => 'required|integer|min:1',
        ]);

        // Save to bookings table (if created)
        // Booking::create([...]);

        return redirect()->back()->with('success', 'Booking submitted!');
    }
}
