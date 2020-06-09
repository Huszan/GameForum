<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\User;
use Auth;

class UserController extends Controller
{
    public function update_avatar(Request $request)
    {

        $this->validate($request, [
            'avatar_image' => 'image|nullable|max:1999'
        ]); 

            $user = auth()->user();

        if($request->hasFile('avatar_image')){
            //Get filename with the extenction
            $filenameWithExt = $request->file('avatar_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get ext
            $extension = $request->file('avatar_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload
            $path = $request->file('avatar_image')->storeAs('public/avatar_images', $fileNameToStore);
            //Store avatar name in user
            $user->avatar_image = $fileNameToStore;
            $user->save();
            Log::info("{{$user->id}} has updated profile pic");
        }
        
        return redirect('home')->with('success', 'Avatar Updated');
    }
}