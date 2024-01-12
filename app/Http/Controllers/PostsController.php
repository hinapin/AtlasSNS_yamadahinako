<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;



class PostsController extends Controller
{
    ///画面に表示させる
    public function index(Request $request){
         $list = Auth::user();
        // $list = Post::get(); // Postテーブルから情報を拾う
         $list = Post::orderBy('created_at','desc')->get();  //  登録された順に並び替えて取り出す
         $user_id = Auth::id();

        // 値をbladeに受け渡す記述
        return view('posts.index',['list'=> $list , 'user_id' => $user_id]);

    }

    // つぶやき機能
    public function posting(Request $request){

        // バリデーションをする

        $request->validate([
            'new-post' => 'required|unique:posts,post|min:1|max:150',
        ]);

        $post = $request->input('new-post');
        $user_id = Auth::id();// 誰のつぶやきかわかるように

        Post::create([
            'user_id' => $user_id,
            'post' => $post,
        ]);

        return redirect('/top');
    }


    // つぶやきを更新する
    public function update(Request $request){

        $id = $request->input('id');
        $up_post = $request->input('upPost');


        // dd($up_post);

        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);

        return redirect('/top');

    }

    // つぶやきを削除する

    public function delete($id){

        Post::where('id',$id)->delete();
        return redirect('/top');
    }

}
