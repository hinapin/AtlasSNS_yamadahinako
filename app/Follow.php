<?php

namespace App;
use App\User;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'username', 'mail', 'password','following_id','follower','isFollowing','following',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this -> belongsTo('App\Post');
    }

    // // カウント関数を使う
    // public function getFollowCount($user_id){
    //     return $this->where('following_id',$user_id)->count();
    // }

    // public function getFollowerCount($user_id){
    //     return $this->where('followed_id',$user_id)->count();
    // }
}
