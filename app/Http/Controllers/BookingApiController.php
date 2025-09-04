<?php

// app/Http/Controllers/BookingApiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingApiController extends Controller
{
    /**
     * Return an array of {from:'YYYY-MM-DD', to:'YYYY-MM-DD'} objects
     * for all confirmed reservations of this room.
     */
    public function unavailable(Request $request, int $room)
    {
        $busy = Reservation::where('room_id', $room)
            ->where('status', 'confirmed')
            ->select('checkin_datetime', 'checkout_datetime')
            ->get();

        $ranges = $busy->map(fn ($r) => [
            'from' => Carbon::parse($r->checkin_datetime)->format('Y-m-d'),
            // subtract 1 second so back‑to‑back bookings are allowed
            'to'   => Carbon::parse($r->checkout_datetime)
                        ->subSecond()->format('Y-m-d'),
        ]);

        return response()->json($ranges);
    }
}
