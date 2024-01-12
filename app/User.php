<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Follow;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','following_id','follower','isFollowing','user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 繋ぐモデルとの関係性を定義してあげる
    // Postテーブルとリレーション　（繋げてあげる）

    public function post(){
        return $this ->belongsToMany('App\Post');
    }

    // フォローしているユーザーを取得
    // ①相手のクラス②中間テーブル③自分のカラム④相手のカラム
    public function follows(){
        return $this ->belongsToMany('App\User','follows','following_id','followed_id');
    }
    // フォローされているユーザーを取得
    // ①相手のクラス②中間テーブル③相手のカラム④自分のカラム
    public function follower(){
        return $this ->belongsToMany('App\User','follows','followed_id','following_id');
    }
    // フォローする
    public function follow(Int $user_id){
        return $this->follows()->attach($user_id);
    }


}
