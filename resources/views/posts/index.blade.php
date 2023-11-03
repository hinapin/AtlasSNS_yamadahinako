@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/top']) !!}
{{ Form::token()}}
<div class="form-container">

  <img src="{{ asset('/images/icon1.png') }}" class="profile-image">

  {{ Form::text('new-post',null,['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}

  <button type="submit" class="submit-btn"><img src="images/post.png"></button>

</div>

<div class="b-color"></div>





{!! Form::close() !!}





<div>
  @foreach ($list as $list)
  <div class="lists">
    <tr>
      <div class="contents">
        <div class="contents1">
          <div><img src="{{ asset('/images/icon1.png') }}" class="profile-image"></div>
          <div class="post-user"><td>{{ $list->user->username }}</td><br></div>
          <div class="create-time"><td>{{ $list->created_at }}</td><br></div>
          <!-- <td>{{ $list->user_id }}</td><br> -->
        </div>

        <div class="v-post"><td>{{ $list->post }}</td><br></div>

        <div class="contents2">
          <button type="button" class="edit-btn"><img src="images/edit.png"></button>
          <button type="submit" class="trash-btn"><img src="images/trash.png"></button>
        </div>
        </div>
      <div class="b-color1"></div>
    </tr>
  </div>
  @endforeach
</div>

<!-- 更新用 -->
<div class="edit-container">

{!! Form::open(['url' => '/post/update']) !!}
  <input type="text" name="upPost" class="edit-form"></input>
  <input type="hidden" name="post_id" class="edit-id" value="">
  <button type="submit" class="edit-close"><img src="images/edit.png"></button>
{!! Form::close() !!}
</div>

@endsection
