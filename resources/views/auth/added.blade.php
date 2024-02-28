@extends('layouts.logout')

@section('content')

<header>
    <h1><a href="/top"><img src="images/atlas.png" class="atlas-logo" ></a></h1>
    <p class="phrase">Social Network Service</p>
</header>

<div class="clear">
  <div class="welcome">
    <p>{{ session()->get('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ</p>
  </div>
  <p>ユーザー登録が完了いたしました。</p>
  <p>早速ログインをしてみましょう！</p>
  <p class="btn"><a href="/login" class="btn btn-danger login-btn2">ログイン画面へ</a></p>
</div>

@endsection
