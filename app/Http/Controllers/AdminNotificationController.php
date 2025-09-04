<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

use function Laravel\Prompts\alert;

class AdminNotificationController extends Controller
{
    public function notifications(){
        $unreadNotifications = Reservation::where('is_read',false)->latest()->get();
        $readNotifications = Reservation::where('is_read',true)->latest()->get();

        $unreadCount = $unreadNotifications->count();
        $readCount = $readNotifications->count();

        $totalCount = $unreadCount + $readCount;

        // dd($unreadNotifications);

        return view('admin.notifications', compact('unreadCount','readCount','totalCount','unreadNotifications','readNotifications'));
    }

    public function markNotificationAsRead($id){
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'is_read' => true
        ]);

        return response()->json(['success' => true]);
    }

    public function getLatestUnread(){
        $unreadNotifications = Reservation::where('is_read', false)->latest()->get();

        return view('admin.partials.unread-notifications', compact('unreadNotifications'))->render();
    }


    public function clearAllReadNotifications(){
        $deleted = Reservation::where('is_read', true)
                    ->where('updated_at', '<', now()->subHours(24))
                    ->delete();
        return response()->json([
            'success' => true,
            'count' => $deleted,
        ]);
    }


}
