<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=> 'required|string|max:100',
            'password'=> 'required|string|max:100',
            'role_name' => 'required|string',
            'status' => 'required|string|in:active,inActive'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        UserRole::create([
            'user_id' => $user->id,
            'role_name' => $request->role_name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success','Registration Completed!!');
    }
}
