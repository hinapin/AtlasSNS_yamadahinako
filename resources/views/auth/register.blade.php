@extends('layouts.logout')

@section('content')

<!-- ↓バリデーションのエラーメッセージを画面で見れるように -->

@if ($errors->any())
<div>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="register-page">

  <h2 class="register-inf">新規ユーザー登録</h2>

    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}

    {{ Form::label('password') }}
    {{ Form::text('password',null,['class' => 'input']) }}

    {{ Form::label('password comfirm') }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}

    {{ Form::submit('register' , ['class' => 'btn btn-danger'])}}
  <p><a class="back-login" href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
