<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminProfileController extends Controller
{
    public function filter(){
        $fullAccess = User::whereHas('role', function($query){
            $query->where('access','full');
        })->with('role')->get();

        $fullAccessCount = $fullAccess->count();

        $viewAccess = User::whereHas('role', function($query){
            $query->where('access', 'view');
        })->with('role')->get();


        $viewAccessCount = $viewAccess->count();

        return view('admin.profile', compact('fullAccess','fullAccessCount','viewAccess','viewAccessCount'));

    }



    public function edit($id){
        $user = User::with('role')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->image){
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            dd($imageName);
            $path = public_path('profile/');
            if(!file_exists($path)){
                mkdir($path, 0755,true);
            }

            $imageSize = $image->getSize();

            if($imageSize > 1048576){
                $manager = new ImageManager(new Driver());

                $compressedImage = $manager->read($image->getPathname())
                ->resize(2100, null, function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->toJpeg(70);

                file_put_contents($path . $imageName, $compressedImage);
            }else{
                $image->move($path, $imageName);
            }


            $imagePath = 'profile/' . $imageName;

            // dd($imagePath);

        }





        // $user->profileImage = $request->image;
        $user->save();

        $user->role->status = $request->status;
        $user->role->access = $request->access;
        $user->role->save();

        return response()->json(['message'=>'Admin updated successfully']);
    }


}
