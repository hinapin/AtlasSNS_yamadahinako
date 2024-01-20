<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ

// ↓このauthというミドルウェアは、ユーザがログインしているかどうかを確認できるミドルウェア
//  ログインしていたらルーティング通りの処理、していなければログインページに飛ぶ

Route::group(['middleware' => 'auth'], function(){

// トップページへ
 Route::get('/top','PostsController@index');
//  Route::post('/top','PostsController@index');
 Route::post('/top','PostsController@posting');
//  つぶやきの編集
 Route::post('/post/update','PostsController@update');
//  つぶやきの削除...パラメータを受け流す
 Route::get('/post/{user_id}/delete','PostsController@delete');

// プロフィール編集へ
 Route::get('/profile','UsersController@profile');
 Route::get('/profile/update','UsersController@updateProfile');
 Route::post('/profile/update','UsersController@updateProfile');


// ユーザー検索ページへ
 Route::get('/search','UsersController@search');
//  フォローする
 Route::post('/users/{user}/follow','UsersController@follow')->name('follow');

//  フォローを解除する
 Route::post('/users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

 //  フォローリスト
 Route::get('/follow-list','FollowsController@followList');
//  フォロワーリスト
 Route::get('/follower-list','FollowsController@followerList');



//  ログアウトする
 Route::get('/logout','Auth\LoginController@logout');

});
