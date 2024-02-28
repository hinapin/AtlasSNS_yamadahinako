@extends('layouts.logout')

@section('content')

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<header>
    <h1><a href="/top"><img src="images/atlas.png" class="atlas-logo" ></a></h1>
    <p class="phrase">Social Network Service</p>
</header>

<div class="login-page">
  <p class="login-message">AtlasSNSへようこそ</p>
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
    {{ Form::submit('　LOGIN　',['class' => 'btn btn-danger login-btn']) }}
  <p><a href="/register" class="register-message">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
