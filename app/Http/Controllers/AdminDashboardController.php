<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        // total admins
        $adminUsers = User::whereHas('role', function($query){
            $query->where('role_name','admin');
        })->with('role')->get();

        $totalAdmins = $adminUsers->count();

        //total rooms
        $allRooms = Room::all();

        $totalRooms = $allRooms->count();

        //total reservations
        $pendingReservations = Reservation::with(['room','user'])
            ->where('status','pending')
            ->get();

        $totalPendingReservations = $pendingReservations->count();

        //unread notifications
        $unreadNotifications = Reservation::where('is_read',false)->latest()->get();

        $totalPendingNotifications = $unreadNotifications->count();

        return view('admin.admin-home', compact('totalAdmins','totalRooms','totalPendingReservations','totalPendingNotifications'));


    }
}
