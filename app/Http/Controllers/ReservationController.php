<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\TelegramHelper;
use App\Models\ReservationUser;
use App\Events\ReservationCreated;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class ReservationController extends Controller
{

    public function manageReservations(){


        $pendingReservations = Reservation::with(['room','user'])
            ->where('status','pending')
            ->get();

        $confirmedReservations = Reservation::with(['room','user'])
            ->where('status','confirmed')
            ->get();

        $pendingCount = $pendingReservations->count();
        $confirmedCount = $confirmedReservations->count();

        $totalCount = Reservation::count();

        return view('admin.manage-reservations', compact(
            'pendingReservations',
            'confirmedReservations',
            'pendingCount',
            'confirmedCount',
            'totalCount'
        ));
    }

    public function updateStatus(Request $request){

        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'status' => 'required|in:pending,confirmed,cancelled',
            'payment_status' => 'required|in:pending,paid,'
        ]);

        $reservation = Reservation::findOrFail($request->reservation_id);
        $reservation->status = $request->status;
        $reservation->payment_status = $request->payment_status;
        $reservation->save();

        return back()->with('success', 'Reservation status updated successfully!');

    }


    public function show($id)
    {
        $reservation = Reservation::with('room', 'user')->findOrFail($id);

        // Format the meal plan
        $mealPlanArray = is_array($reservation->mealPlan) ? $reservation->mealPlan : json_decode($reservation->mealPlan, true);
        $formattedMealPlan = collect($mealPlanArray)->map(function ($item) {
            return ucwords(str_replace('_', ' ', strtolower($item)));
        })->implode(',  ');

        //format datetime fields
        $checkinDate = $reservation->checkin_datetime ? Carbon::parse($reservation->checkin_datetime)->format('Y-m-d') : null;
        $checkinTime = $reservation->checkin_datetime ? Carbon::parse($reservation->checkin_datetime)->format('H:i') : null;
        $checkoutDate = $reservation->checkout_datetime ? Carbon::parse($reservation->checkout_datetime)->format('Y-m-d') : null;
        $checkoutTime = $reservation->checkout_datetime ? Carbon::parse($reservation->checkout_datetime)->format('H:i') : null;



        // Append formatted meal plan
        $reservation->formatted_meal_plan = $formattedMealPlan;
        $reservation->checkInDate = $checkinDate;
        $reservation->checkInTime = $checkinTime;
        $reservation->checkOutDate = $checkoutDate;
        $reservation->checkOutTime = $checkoutTime;

        return response()->json($reservation);

    }
    public function submitForm(Request $request, $id)
{

    // 1. Build validator so we can apply custom rules
    // dd($request->all());
    $validator = Validator::make($request->all(), [

        // Basic validations with patterns
        'first_name' => ['required', 'regex:/^[A-Za-z\s]+$/'],           // <-- only letters and spaces
        'last_name'  => ['required', 'regex:/^[A-Za-z\s]+$/'],           // <-- only letters and spaces
        'nic'        => ['required', 'regex:/^(\d{9}[vVxX]|\d{12})$/'],  // <-- valid NIC formats
        'contact'    => ['required', 'regex:/^0\d{9}$/'],                // <-- must be 10 digits starting with 0
        'email'      => ['required', 'email'],

        // Date & time validation
        'checkin_datetime' => ['required', 'date_format:Y-m-d H:i'],
        'checkout_datetime' => [ 'required','date_format:Y-m-d H:i', 'after:checkin_datetime' ],

        // Guest count rules
        'adults'   => ['required', 'integer', 'min:1'],
        'children' => ['required', 'integer', 'min:0'],

        // Room selection
        'room_id' => ['required', 'exists:rooms,id'],

        // Meals
        'meals'   => ['nullable', 'array'],
        'meals.*' => ['in:breakfast,lunch,dinner,tea,snacks,juice,high_tea,special_dinner,kids_meal'],

    ]);


    // 2. Custom logic: total guests must be < 10
    $validator->after(function ($validator) use ($request) {
        $total = (int) $request->adults + (int) $request->children;
        if ($total >= 10) {
            $validator->errors()->add('adults', 'Total guests (adults + children) must be less than 10.');
        }
    });

    // 3. Trigger validation
    $validated = $validator->validate();


    // Save or find user
    $user = ReservationUser::create(
        [
            'email' => $validated['email'], // search by email
            'fname' => $validated['first_name'],
            'lname' => $validated['last_name'],
            'nic' => $validated['nic'],
            'number' => $validated['contact'],
    ]
        // ['first_name' => $validated['first_name'], 'last_name' => $validated['last_name']]
    );


    $data = $validator->validated();

    $dataArray = json_encode($data);
    // dd(json_encode($data));

    //telegram parser
    // TelegramHelper::sendReservationNotification($data);

    //firebase
    // $admins = User::whereHas('role', function ($q) {
    //     $q->where('role_name', 'admin');
    // })->whereNotNull('fcm_token')->get();


    // foreach ($admins as $admin) {
    //     try{
    //         app(FcmController::class)->sendFcmNotification(new Request([
    //             'user_id' => $admin->id,
    //             'title' => 'New Booking!',
    //             'body' => "{$data['first_name']} booked a room from {$data['checkin_datetime']} to {$data['checkout_datetime']}",
    //             'dataArray' => $dataArray,
    //         ]));
    //     }catch(Exception $e){
    //         dd($e->getMessage());
    //     }
    // }


    try{
        app(FcmController::class)->sendFcmNotification(new Request([
            'topic' => 'admin-reservations', 
            'title' => 'New Booking!',
            'body' => "{$data['first_name']} booked a room from {$data['checkin_datetime']} to {$data['checkout_datetime']}",
            'dataArray' => $dataArray,
        ]));
    }catch(Exception $e){
        dd($e->getMessage());
    }

    $meals = $validated['meals'] ?? [];

    // final price calculation

    $mealPrices = [
        'breakfast' => 500,
        'lunch' => 800,
        'dinner' => 900,
        'tea' => 300,
        'snacks' => 350,
        'juice' => 250,
        'high_tea' => 600,
        'special_dinner' => 1200,
        'kids_meal' => 400,
    ];

    $totalMealPrice = 0;

    foreach($request->meals ?? [] as $mealName){
        $totalMealPrice += $mealPrices[$mealName] ?? 0;
    }


    $checkIn = Carbon::parse($validated['checkin_datetime']);
    $checkOut = Carbon::parse($validated['checkout_datetime']);

    $stayDays = max(1, $checkIn->diffInDays($checkOut));
    $numDays = (int) ceil($stayDays);
    $room = Room::findOrFail($id);
    $roomPrice = $room->price ?? 0;
    $roomFinalPrice = $roomPrice * $stayDays;
    $finalPrice = $roomFinalPrice + $totalMealPrice;

    // Save booking
   do {
    $bookingCode = 'BOOK-' . strtoupper(Str::random(6)) . '-' . now()->format('YmdHis');
} while (Reservation::where('booking_code', $bookingCode)->exists());
//dd($bookingCode);
    $booking = Reservation::create([
        'user_id' => $user->id,
        'room_id' => $id,
        'checkin_datetime' => $validated['checkin_datetime'],
        'checkout_datetime' => $validated['checkout_datetime'],
        'adult' => $validated['adults'],
        'child' => $validated['children'],
        // 'checkInTime' => $validated['checkin_time'],
        // 'checkOutTime' => $validated['checkout_time'],
        'mealPlan' => json_encode($meals) ?? 'none',
        'mealPrice' => $totalMealPrice ?? 0,
        'roomPrice' => $roomFinalPrice ?? 0,
        'numDays' => $numDays ?? 0,
        'booking_code' => $bookingCode ?? 'none',
        'price' => $finalPrice,
        'payment_status' => 'Pending',

    ]);


    return redirect()->back()->with('success', 'Booking submitted! Your Booking ID is: '. $booking->booking_code)->withFragment('success-message');
}
public function searchBooking(Request $request)
{
    // $request->validate([
    //     'booking_code' => 'required|string',
    // ]);

     $booking = null;
    $reservations = null;
    // $rooms= null;

     if ($request->filled('booking_code')) {
        $booking = Reservation::with('user', 'room')
            ->where('booking_code', $request->booking_code)
            ->first();
            // $rooms = $booking ? collect([$booking->room->room_name]) : collect();
    } elseif ($request->filled('nic')) {
        $reservations = Reservation::with('room', 'user')->whereHas('user', function ($query) use ($request) {
            $query->where('nic', $request->nic);
        })->get();
    }
    // dd($booking);
    // $room = Room::findOrFail($booking->room_id);
    // dd($booking->room_id);
    //  $noa =$booking->room_id;
    //  $room = Room::where('id')->findOrFail($noa);
    //  dd($room);


    $rooms = Room::all();
    //  dd($rooms);
     if ($request->ajax()) {
        return view('components.booking_results', compact('booking', 'reservations','rooms'))->render();
    }
    // if ($booking || ($reservations && $reservations->isNotEmpty())) {
        // return view('rooms', compact('booking','reservations', 'rooms'));
    // } else {
    //     return redirect()->back()->with('error', 'Booking not found.');
    // }
}
public function search(Request $request)
{
    $query = Reservation::with(['user', 'room']);

    if ($request->filled('booking_code')) {
        $query->where('booking_code', $request->booking_code);
    }

    if ($request->filled('nic')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('nic', $request->nic);
        });
    }

    $reservations = $query->get();

    return view('admin.manage-reservations', compact('reservations'));
}
}
