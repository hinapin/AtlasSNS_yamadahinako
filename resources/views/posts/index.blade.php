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

      @if ($user_id == $list->id)

        <div class="contents2">
        <!-- 更新 -->
          <button type="button" class="edit-btn" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="images/edit.png"></button>

        <!-- 削除 -->
          <!-- <button type="submit" class="trash-btn" href="" post= "{{ $list->post }}" post_id="{{ $list->id }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></button> -->

          <td><a class="trash-btn" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></a></td>
        <!-- aタグによって別のページに移動する属性→href属性でその方向性を記述 -->
        </div>

      @endif


        </div>
      <div class="b-color1"></div>
    </tr>
  </div>
  @endforeach
</div>

<!-- 更新用モーダル-->
<div class="edit-container">
  <div class="modal__bg edit-close"></div>
  <div class="modal__content">
    <form action="/post/update" method="post">

      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <button type="submit" class="edit-close"><img src="images/edit.png"></button>
      {{ csrf_field() }}
    </form>
  </div>
</div>

@endsection
