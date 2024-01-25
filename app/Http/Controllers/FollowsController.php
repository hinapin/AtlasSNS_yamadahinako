<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Post;
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

        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
        // dd($posts);

        return view('follows.followList',['follows'=>$follows, 'posts'=>$posts]);
    }

    public function followerList(){
        $followers = Auth::user()->follower()->get();
        $followed_id = Auth::user()->follower()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->latest()->get();


        // dd($posts);

        return view('follows.followerList',['followers'=>$followers, 'posts'=>$posts ]);
    }

}
