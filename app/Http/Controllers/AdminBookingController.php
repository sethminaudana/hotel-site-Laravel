<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function showAvailableRooms(){
        $availableRooms = Room::with('details')->where('status', 'available')->get();

        // dd($availableRooms);
        return view('admin.admin-reservations', compact('availableRooms'));
    }
}
