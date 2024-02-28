@extends('layouts.logout')

@section('content')

<!-- ↓バリデーションのエラーメッセージを画面で見れるように -->




<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<header>
    <h1><a href="/top"><img src="images/atlas.png" class="atlas-logo-r" ></a></h1>
    <p class="phrase-r">Social Network Service</p>
</header>

<div class="register-page">
  <h2 class="register-inf">新規ユーザー登録</h2>
  <div Class="register-list">
  {{ Form::label('user name') }}
  {{ Form::text('username',null,['class' => 'input']) }}
  </div>
  <div Class="register-list">
  {{ Form::label('mail adress') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div Class="register-list">
  {{ Form::label('password') }}
  <!-- {{ Form::password('password',null,['class' => 'pass-input']) }} -->
  {{ Form::password('password',['class' => 'input']) }}
  </div>
  <div Class="register-list">
  {{ Form::label('password comfirm') }}
  {{ Form::password('password_confirmation',['class' => 'input']) }}
  </div>
  {{ Form::submit('　REGISTER　' , ['class' => 'btn btn-danger register-btn'])}}
  <p><a class="back-login" href="/login">ログイン画面へ戻る</a></p>

</div>

@if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{!! Form::close() !!}


@endsection
