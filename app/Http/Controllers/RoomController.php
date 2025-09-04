<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RoomController extends Controller
{

    public function getAllRooms(Request $request){

        // dd("ddd");
        // $rooms = Room::with('features')->get();
    //     $rooms = Room::with('features')
    //                     ->where('status','available')
    //                     ->get();
    //     $rooms = Room::all();
    //     $rooms = Room::with('features')->get();
    //     return View('rooms', compact('rooms'));
    // }

    // public function showRoomDetails($id){
    //     $rooms = Room::all();
    //     $room = Room::with('details')->findOrFail($id);
    //     return view('room_details', compact('room'));
    // }
    // public function showRoomDetailsform($id){
    //     $rooms = Room::all();
    //     $room = Room::with('details')->findOrFail($id);
    //     return view('booking', compact('room'));

         $adults = (int) $request->input('adults');
    $children = (int) $request->input('children');
        $bookingDate = $request->input('booking_date');
        $checkout_date = $request->input('checkout_date');
        // dd($bookingDate, $checkout_date);
          $query = Room::with('features')
        ->where('status', 'available');

        if ($adults || $children ) {
         $query = Room::whereHas('details', function ($q) use ($adults, $children) {
        $q->where('adult', '>=', $adults)
              ->where('child', '>=', $children);
    });
}

     if ($bookingDate || $checkout_date ) {
        $start = Carbon::parse($bookingDate);
        $end = Carbon::parse($checkout_date);

        $query->whereDoesntHave('reservations', function ($q) use ($start, $end) {
            $q->where(function ($q2) use ($start, $end) {
                $q2->where('checkin_datetime', '<=', $end)
                   ->where('checkout_datetime', '>', $start);
            });
        });
    }

    $rooms = $query->get();
    // dd($rooms);
        // $rooms = Room::with('features')
        //          ->where('status','available');

        // if ($bookingDate) {
        //     $date = Carbon::parse($bookingDate);

        //     $rooms = $rooms->whereDoesntHave('reservations', function ($query) use ($date) {
        //         $query
        //             ->whereDate('checkin_datetime', '<=', $date)
        //             ->whereDate('checkout_datetime', '>', $date);
        //     });
        // }

        // $rooms = $rooms->get();
        if ($request->ajax()) {
            // dd("dd");
            // Return only the HTML for the room cards so we can drop it straight into the page
            $html = view('components.room_cards', compact('rooms'))->render();
            return response()->json(['html' => $html]);
        }

        return view('rooms', compact('rooms'));
    }
     public function showRoomDetails($id,Request $request){
        $rooms = Room::all();
        $room = Room::with('details')->findOrFail($id);

        // if($request){
            $bookingDate = $request->query('booking_date');
            $checkout_date = $request->query('checkout_date');
            $adults = $request->query('adults');
            $children = $request->query('children');

       $bookedDates = [];

$reservations = Reservation::where('room_id', $id)
    ->whereNotNull('checkin_datetime')
    ->whereNotNull('checkout_datetime')
    ->get();

foreach ($reservations as $reservation) {
    $start = \Carbon\Carbon::parse($reservation->checkin_datetime)->startOfDay();
    $end = \Carbon\Carbon::parse($reservation->checkout_datetime)->endOfDay(); // exclusive of checkout day

    // Generate range of dates between check-in and checkout (excluding checkout)
    $period = CarbonPeriod::create($start, $end);

    foreach ($period as $date) {
        $bookedDates[] = $date->format('Y-m-d H:i');
    }
}
// dd($bookedDates);

// Remove duplicates just in case
$bookedDates = array_unique($bookedDates);

// Optionally: reset array keys
$bookedDates = array_values($bookedDates);

            // Get last checkout datetime for this room
    $lastCheckout = Reservation::where('room_id', $id)
         ->whereNotNull('checkout_datetime')// optional: only confirmed bookings
        ->orderByDesc('checkout_datetime')
        ->value('checkout_datetime');
        // dd($id);

        $lastCheckin = Reservation::where('room_id', $id)
         ->whereNotNull('checkin_datetime')// optional: only confirmed bookings
        ->orderByDesc('checkin_datetime')
        ->value('checkin_datetime');
       // dd($lastCheckin);

       $roomsfilter = Room::with('features')
                ->where('status','available')
                ->take(2)
                ->get();



        return view('room_details', compact('room', 'lastCheckout','lastCheckin', 'bookingDate', 'checkout_date', 'adults', 'children','roomsfilter','bookedDates'));
    }
    public function showRoomDetailsform($id,Request $request){

        $rooms = Room::all();
        $room = Room::with('details')->findOrFail($id);
        $selectedDate = $request->query('date');
         $booking_date = $request->query('date');
    $checkout_date = $request->query('checkout');
    $adults = $request->query('adults');
    $children = $request->query('children');
    // dd($booking_date);
        //dd($request->query('date'));
         // Get last checkout datetime for this room
    $lastCheckout = Reservation::where('room_id', $id)
         ->whereNotNull('checkout_datetime')// optional: only confirmed bookings
        ->orderByDesc('checkout_datetime')
        ->value('checkout_datetime');
        // dd($id);
        $lastCheckin = Reservation::where('room_id', $id)
         ->whereNotNull('checkin_datetime')// optional: only confirmed bookings
        ->orderByDesc('checkout_datetime')
        ->value('checkin_datetime');


        return view('booking', compact('room', 'lastCheckout','selectedDate','lastCheckin','booking_date', 'checkout_date', 'adults', 'children'));}

        // app/Http/Controllers/RoomController.php

public function
bookingSubmit($id,Request $request)
{
       // Get room data
    $rooms = Room::all();
    $room = Room::with('details')->findOrFail($id);

    // Get form data
    $booking_date = $request->query('booking_date');
    $checkout_date = $request->query('checkout_date');
    $adults = $request->query('adults');
    $children = $request->query('children');
 $selectedDate =  Carbon::parse($booking_date);
// dd($request->all());
    // Get last reservation info
    $lastCheckout = Reservation::where('room_id', $id)
        ->whereNotNull('checkout_datetime')
        ->orderByDesc('checkout_datetime')
        ->value('checkout_datetime');

    $lastCheckin = Reservation::where('room_id', $id)
        ->whereNotNull('checkin_datetime')
        ->orderByDesc('checkin_datetime')
        ->value('checkin_datetime');

    // Pass everything to view
    return view('booking', compact(
        'rooms', 'room', 'booking_date', 'checkout_date', 'selectedDate','adults', 'children',
        'lastCheckin', 'lastCheckout'
    ));
}


}
