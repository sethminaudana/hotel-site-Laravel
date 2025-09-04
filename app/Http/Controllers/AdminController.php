<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminList(){

        $adminUsers = User::whereHas('role',function ($query){
            $query->where('role_name','admin');
        })->with('role')->get();

        $adminCount = $adminUsers->count();

        return view('admin.user-registration', compact('adminUsers','adminCount'));
    }

    public function destroy($id){

        $user = User::findOrFail($id);

        $user->role->delete();

        $user->delete();

        return redirect()->back()->with('success', 'Admin removed successfully.');
    }
    
}
