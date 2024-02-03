@extends('layouts.login')

@section('content')

<div class="listform-container">
  <h1 class="caption">Follow List</h1>
  @foreach ($follows as $follow)
  <div class="list-member"><a href="/users/{{$follow->id}}/profile"><img src="{{ asset('storage/'.$follow->images)}}" class="profile-image"></a></div>
  @endforeach

</div>

<div class="b-color"></div>

<div class="lists">
  @foreach ($posts as $post)
  <tr>
    <div class="contents">
      <div class="contents1">
          <td><a href="/users/{{$post->user->id}}/profile"><img src="{{ asset('storage/'.$post->user->images)}}" class="profile-image"></a></td>
          <div class="content">
            <div class="post-user"><td>{{ $post->user->username }}</td><br></div>
            <div class="v-post"><td>{{ $post->post}}</td><br></div>
          </div>
          <div class="create-time"><td>{{ $post->created_at }}</td><br></div>
      </div>
    </div>
    <div class="b-color1"></div>
  </tr>
  @endforeach
</div>




@endsection
