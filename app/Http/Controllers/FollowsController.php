<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use APP\Post;
use App\Follow;

class FollowsController extends Controller
{

    // public function Count(){
    //     $follow_count = $user->getFollowCount();
    //     $follower_count = $user->getFollowerCount();

    //     return view('auth.login',compact('following_id','followed_id'));
    // }
    //
    public function followList(){
        // ↓フォローしている人の情報を取得
        $follows = Auth::user()->follows()->get();
        // ↓フォローしているユーザーのidを習得
        // pluck()...あるキーだけの情報をまとめて持ってきたい場合などに使える。
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::query()->whereIn('user_id',Auth::user()->follows())->pluck('followed_id')>latest()->get();
        dd($posts);

        return view('follows.followList',['follows'=>$follows, 'posts'=>$posts]);
    }

    public function followerList(){
        $followers = Auth::user()->follower()->get();
        $followed_id = Auth::user()->follower()->pluck('followed_id');

        // dd($followed_id);

        return view('follows.followerList',['followers'=>$followers]);
    }

}
