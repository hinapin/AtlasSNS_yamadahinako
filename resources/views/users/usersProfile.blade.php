@extends('layouts.login')

@section('content')



<div class="form-container">
    @if($users->images == "icon1.png")
    <img src="/images/icon1.png" class="profile-image">
    @else
      <img src="{{ asset('storage/'.$users->images)}}" class="profile-image menu-list">
    @endif
  <!-- <div><img src="{{ asset('storage/'.$users->images)}}" class="profile-image"></div> -->
  <div class="name-bio">
    <div class="introduction">
      <div class="profile-item">name</div>
      <div class="profile-user"><td>{{ $users->username }}</td><br></div>
    </div>
    <div class="introduction">
      <div class="profile-item">bio　</div>
      <div class="profile-user"><td>{{ $users->bio }}</td><br></div>
    </div>
  </div>

  <td>
          <!-- ↓もしフォローしていたら、解除を表示する -->
          @if (auth()->user()->isFollowing($users->id))
            <form action="{{ route('unfollow',$users->id)}}" method="post"><!-- ルーティングのURLを表示させる -->
              @csrf
              <button type="submit" class="btn btn-info prunfollow-btn" >　フォロー解除　</button>
            </form>
          @else
            <form action="{{ route('follow',$users->id)}}" method="post"><!-- ルーティングのURLを表示させる -->
              @csrf
              <button type="submit" class="btn btn-danger prfollow-btn">　フォローする　</button>
            </form>
          @endif
        </td>

</div>

<div class="b-color"></div>

@foreach($posts as $post)
<div class="lists">
  <tr>
    <div class="contents">
      <div class="contents1">
        @if($users->images == "icon1.png")
        <img src="/images/icon1.png" class="profile-image">
        @else
          <img src="{{ asset('storage/'.$users->images)}}" class="profile-image menu-list">
        @endif
          <!-- <div><img src="{{ asset('storage/'.$users->images)}}" class="profile-image"></div> -->
          <div class="content">
            <div class="post-user"><td>{{ $users->username }}</td><br></div>
            <div class="v-post"><td>{{ $post->post }}</td><br></div>
          </div>
          <div class="create-time"><td>{{ $post->created_at }}</td><br></div>
      </div>
    </div>
    <div class="b-color1"></div>
  </tr>
</div>
@endforeach

@endsection
