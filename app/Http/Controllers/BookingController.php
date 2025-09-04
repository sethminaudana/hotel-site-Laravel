<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
//     public function create(Request $request)
// {
//     $selectedDate = $request->query('date');
//      $roomId = $request->query('room_id');
//       $room = $roomId ? Room::find($roomId) : null;
//       dd($selectedDate,$room);

//     return view('booking', compact('selectedDate'));
// }
}
