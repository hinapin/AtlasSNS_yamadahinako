@extends('layouts.login')

@section('content')

<div class="search-user">

  {{ Form::input('username',null,['class' => 'username', 'placeholder' => 'ユーザー名']) }}

  <div><a href="{{ URL::to('/search') }}"><img src="{{ asset('/images/search.png') }}" class="search-btn"></a></div>

</div>

@endsection
