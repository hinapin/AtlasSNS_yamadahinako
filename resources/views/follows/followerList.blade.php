@extends('layouts.login')

@section('content')

<div class="form-container">

<h1>Follower List</h1>
@foreach ($followers as $followed_id)
<td><a href="/users/{{$followed_id->id}}/profile"><img src="{{ asset('storage/'.$followed_id->images)}}" class="profile-image"></a></td>
@endforeach
</div>

<div class="b-color"></div>

<div class="lists">
  @foreach ($posts as $post)
  <tr>
    <div class="contents">
      <div class="contents1">
          <td><a href="/users/{{$post->user->id}}/profile"><img src="{{ asset('storage/'.$post->user->images)}}" class="profile-image"></a></td>
          <div class="post-user"><td>{{ $post->user->username }}</td><br></div>
          <div class="v-post"><td>{{ $post->post}}</td><br></div>
          <div class="create-time"><td>{{ $post->created_at }}</td><br></div>
      </div>
    </div>
    <div class="b-color1"></div>
  </tr>
  @endforeach
</div>
@endsection
