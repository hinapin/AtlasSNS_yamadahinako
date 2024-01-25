<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Follow;
use App\User;

class Post extends Model
{
    //投稿フォーム作成時に記入
    // fillableは複数代入の脆弱性に対応するために必要

    protected $fillable = [
        'user_id','post',
    ];

    // user_tableとリレーション

    public function user()
    {
        return $this -> belongsTo('App\User');
    }

    public function follow(){
        return $this -> belongsTo('App\Follow');
    }
}
