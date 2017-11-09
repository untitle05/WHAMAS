<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function profile(){
        return view('profile', ['user' => Auth::user()
        ]);
    }

    public function update_avatar(Request $r){
        if($r->hasFile('avatar')){
            $avatar = $r->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars/'. $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', ['user' => Auth::user()

        ]);
    }
    //
}
