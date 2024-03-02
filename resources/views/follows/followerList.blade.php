@extends('layouts.login')

@section('content')

<div class="listform-container">

<h1 class="caption">Follower List</h1>
@foreach ($followers as $followed_id)
    @if($followed_id->images == "icon1.png")
    <div class="list-member"><a href="/users/{{$followed_id->id}}/profile"><img src="/images/icon1.png" class="profile-image"></a></div>
    @else
    <div class="list-member"><a href="/users/{{$followed_id->id}}/profile"><img src="{{ asset('storage/'.$followed_id->images)}}" class="profile-image"></a></div>
    @endif
@endforeach
</div>

<div class="b-color"></div>

<div class="lists">
  @foreach ($posts as $post)
  <tr>
    <div class="contents">
      <div class="contents1">
          @if($post->user->images == "icon1.png")
          <td><a href="/users/{{$post->user->id}}/profile"><img src="/images/icon1.png" class="profile-image"></a></td>
          @else
          <td><a href="/users/{{$post->user->id}}/profile"><img src="{{ asset('storage/'.$post->user->images)}}" class="profile-image"></a></td>
          @endif
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
