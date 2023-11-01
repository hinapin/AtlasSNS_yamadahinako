@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/top']) !!}
{{ Form::token()}}
<div class="form-container">

  <img src="{{ asset('/images/icon1.png') }}" class="profile-image">

  {{ Form::text('new-post',null,['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}

  <button type="submit" class="submit-btn"><img src="images/post.png"></button>
</div>





{!! Form::close() !!}





<div class="lists">
  @foreach ($list as $list)
    <tr>
      <td>{{ $list->user->username }}</td><br>
      <!-- <td>{{ $list->user_id }}</td><br> -->
      <td>{{ $list->post }}</td><br>
      <td>{{ $list->created_at }}</td><br>
    </tr>
  @endforeach
</div>
<div>
    <button type="button" class="edit-btn"><img src="images/edit.png"></button>
      <div class="edit-container">
        <input type="text" class="edit-form" placeholder="{{ $list->post }}"></input>
        <button type="submit" class="edit-close"><img src="images/edit.png"></button>
      </div>
</div>


<button type="submit" class="trash-btn"><img src="images/trash.png"></button>


@endsection
