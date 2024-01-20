<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Post;
use App\Follow;
use Auth;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    // 検索結果を表示させる
    public function search(Request $request){

        $user = Auth::user();

       // 検索フォームで入力された値を取得する
        $keyword = $request->input('username');
        // dump($keyword);

        // クエリでデーターベースに問い合わせてキーワードの含む物を取得する
        if(!empty($keyword)){
            $query = User::query();
            $query->where('username', 'LIKE' , "%{$keyword}%");
            $users = $query->get();
            return view('users.search',['users'=>$users , 'user'=>$user, 'keyword'=>$keyword]);
        }
        else {
            // そうでなければ全員取得する
            $users = User::get();

        return view('users.search',['users'=>$users , 'user'=>$user, 'keyword'=>$keyword]);
        }
    }

    // フォロー機能
    public function follow(User $user){
        // ↓ログインしたユーザーのこと
        $follower = Auth::user();
        // ↓フォローしているか
        $is_following = $follower->isFollowing($user->id);
        // ↓もしフォローしていなければ
        if(!$is_following){
        // ↓フォローする
        $follower->follow($user->id);
        // dd($user);
        return redirect('/search');
         }
    }

    // フォロー解除
    public function unfollow(User $user){
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
         // ↓もしフォローしていたら
        if($is_following){
        // ↓フォローを解除する
        $follower->unfollow($user->id);
        // dd($user);
        return redirect('/search');
         }
    }

    // public function store(Request $request){
    //     // バリデーション
    //    $request->validate([
    //     'username' => 'required|min:2|max:12',
    //     'mail' => 'required|unique:users|email:rfc|min:5|max:40',
    //     'password' => 'required|confirmed|alpha_num|min:8|max:20',
    //     'bio' => 'max:150',
    //     'images' => 'file|image|mimes:jpeg,png,bmp,gif,svg',
    // ]);

    // if($image = $request->file('images')){
    //     $file = $request->fill('image')->storeAs('public')->getClientOriginalName();
    //     $path = Storage::url($file);
    //     $update['images'] = $path;

    // }
    // }




    public function updateProfile(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $filename = $request->images->getClientOriginalName();
        $images = $request->images->storeAs('user-images', $filename,'public');

        // dd($images);

        $request->validate([
                'username' => 'required|min:2|max:12',
                'mail' => 'required|unique:users|email:rfc|min:5|max:40',
                'password' => 'required|confirmed|alpha_num|min:8|max:20',
                'bio' => 'max:150',
                'images' => 'file|image|mimes:jpeg,png,bmp,gif,svg',
            ]);


        User::where('id', $id)-> update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $images,
        ]);

        return redirect('/top');

    }
}
