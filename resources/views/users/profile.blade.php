@extends('layouts.login')

@section('content')

<div class="update-container">
@csrf

@if ($errors->any())
<div>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<img src="{{ asset('storage/'.Auth::user()->images) }}" class="update-icon">

{!! Form::open(['url' => '/profile/update' ,'enctype'=> 'multipart/form-data']) !!}

  <div class="update-form">
    <!-- ユーザー名 -->
    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input' , 'placeholder' => Auth::user()->username]) }}
  <!-- メールアドレス -->
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input' , 'placeholder' => Auth::user()->mail]) }}
  <!-- パスワード -->
    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input']) }}
  <!-- パスワード確認用 -->
    {{ Form::label('password comfirm') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  <!-- 自己紹介 -->
    {{ Form::label('bio') }}
    {{ Form::text('bio',null,['class' => 'input' , 'placeholder' => Auth::user()->bio]) }}
  <!-- アイコン画像のアップロード -->
    {{ Form::label('icon image') }}
    {{ Form::file('images', ['class'=>'input'])}}
  <!-- 更新ボタン -->
    {{ Form::submit('更新',['class' => 'btn btn-danger btn-sm']) }}

{{ Form::hidden('id',Auth::user()->id)}}
{{Form::token()}}
{!! Form::close() !!}
  </div>

</div>

@endsection
