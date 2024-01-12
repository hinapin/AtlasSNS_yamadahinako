<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    // // フォローする
    // public function follow(User $user){
    //     $follower=Auth::User();
    // // フォローしているか
    //     $isFollowing=$follower->isFollowing($user->id);
    //     if(!$isFollowing){
    // // フォローしていなければフォローする
    //         $follower->follow($user->id);

    //         dd($user->id);
    //     }
    //     return redirect('/search');
    // }

    // フォローを解除する
    // public function unfollow(User $user){
    //     $follower=Auth::User();
    // // フォローしているか
    //     $is_following=$follower->isFollowing($user->id);
    //     if($is_following){
    // // フォローしていればフォローを解除する
    //         $follower->unfollow($user->id);
    //     }
    //     return redirect('/search');
    // }
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

}
