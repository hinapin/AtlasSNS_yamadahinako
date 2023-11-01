<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //投稿フォーム作成時に記入
    protected $fillable = [
        'post','user_id'
    ];

    // user_tableとリレーション

    public function user()
    {
        return $this ->belongsTo('App\User');
    }
}
