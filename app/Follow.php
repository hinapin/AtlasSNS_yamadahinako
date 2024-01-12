<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'username', 'mail', 'password','following_id','follower','isFollowing',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
