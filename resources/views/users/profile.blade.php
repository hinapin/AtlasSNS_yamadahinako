@extends('layouts.login')

@section('content')

<div class="update-container">

{!! Form::open(['url' => '/profile/update' ,'files'=>true]) !!}
@csrf
{{ Form::hidden('id',Auth::user()->id)}}

<img src="{{ asset( Auth::user()->images) }}" class="update-icon">
  <div class="update-form">
    <!-- ユーザー名 -->
    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input' , 'placeholder' => Auth::user()->username]) }}
  <!-- メールアドレス -->
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input' , 'placeholder' => Auth::user()->mail]) }}
  <!-- パスワード -->
    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input' , 'placeholder' => Auth::user()->password]) }}
  <!-- パスワード確認用 -->
    {{ Form::label('password comfirm') }}
    {{ Form::password('password_confiramation',null,['class' => 'input']) }}
  <!-- 自己紹介 -->
    {{ Form::label('bio') }}
    {{ Form::text('bio',null,['class' => 'input' , 'placeholder' => Auth::user()->bio]) }}
  <!-- アイコン画像のアップロード -->
    {{ Form::label('icon image') }}
    {{Form::file('image', ['class'=>'input','id'=>'fileImage'])}}
  <!-- 更新ボタン -->
    {{ Form::submit('更新',['class' => 'btn btn-danger btn-sm']) }}


{{Form::token()}}
{!! Form::close() !!}
  </div>

</div>

@endsection
