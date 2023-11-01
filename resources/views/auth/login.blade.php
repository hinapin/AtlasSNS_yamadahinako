@extends('layouts.logout')

@section('content')

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}


<div class="login-page">
  <p class="login-message">AtlasSNSへようこそ</p>

    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
    {{ Form::submit('Login',['class' => 'btn btn-danger']) }}
  <p><a href="/register" class="register-message">新規ユーザーの方はこちら</a></p>
</>

{!! Form::close() !!}

@endsection
