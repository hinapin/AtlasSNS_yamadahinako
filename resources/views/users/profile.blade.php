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

  <div class="my-update">

      <img src="{{ asset('storage/'.Auth::user()->images) }}" class="update-icon">

    {!! Form::open(['url' => '/profile/update' ,'enctype'=> 'multipart/form-data']) !!}

      <div class="update-form">
        <!-- ユーザー名 -->
        <div class="update-list">
        {{ Form::label('user name') }}
        {{ Form::text('username',null,['class' => 'input' , 'placeholder' => Auth::user()->username]) }}
        </div>
      <!-- メールアドレス -->
        <div class="update-list">
        {{ Form::label('mail adress') }}
        {{ Form::text('mail',null,['class' => 'input' , 'placeholder' => Auth::user()->mail]) }}
        </div>
      <!-- パスワード -->
        <div class="update-list">
        {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'input']) }}
        </div>
      <!-- パスワード確認用 -->
        <div class="update-list">
        {{ Form::label('password comfirm') }}
        {{ Form::password('password_confirmation', ['class' => 'input']) }}
        </div>
      <!-- 自己紹介 -->
        <div class="update-list">
        {{ Form::label('bio') }}
        {{ Form::text('bio',null,['class' => 'input' , 'placeholder' => Auth::user()->bio]) }}
        </div>
      <!-- アイコン画像のアップロード -->
        <div class="update-list">
        {{ Form::label('icon image') }}
        <label class="file__label">
          <div class="file__in">ファイルを選択</div>
        {{ Form::file('images',['class'=>'input'])}}
        </label>
        </div>

      <!-- 更新ボタン -->
        {{ Form::submit('　　　更新　　　',['class' => 'btn btn-danger btn-sm rebtn']) }}
      </div>

    {{ Form::hidden('id',Auth::user()->id)}}
    {{Form::token()}}
    {!! Form::close() !!}

  </div>

</div>

@endsection
