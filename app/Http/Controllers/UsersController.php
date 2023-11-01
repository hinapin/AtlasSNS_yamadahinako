<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    // public function search(){
    //     return view('users.search');
    // }

    public function updateProfile(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->input('images');


        User::where('id', $id)-> update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password),   // パスワードのハッシュ化
            'bio' => $bio,
            'images' => $images,
        ]);

        return redirect('/top');

    }
}
