@extends('layouts.login')

@section('content')

<div class="form-container">

  <h1>Follow List</h1>
  @foreach ($follows as $follow)
  <img src="{{ asset('storage/'.$follow->images) }}" class="profile-image">
  @endforeach

</div>

<div class="b-color"></div>

<div>

  <div class="lists">
    <tr>
      <div class="contents">
        <div class="contents1">
          @foreach ($follows as $follow)
          <div>
            <img src="{{'storage/'.$follow->images}}" class="profile-image">
          </div>
          @endforeach

          @foreach ($posts as $post)
          <div class="post-user"><td>{{ $posts->user->username }}</td><br></div>
          <div class="create-time"><td>{{ $posts->created_at }}</td><br></div>
          @endforeach
        </div>
        <div class="v-post"><td>{{ $posts->post}}</td><br></div>
        </div>
      <div class="b-color1"></div>
    </tr>
  </div>

</div>


@endsection
