@extends('layouts.login')

@section('content')



<div class="form-container">
  <div><img src="{{ asset('storage/'.$users->images)}}" class="profile-image"></div>
  <div class="profile-item">name</div>
  <div class="post-user"><td>{{ $users->username }}</td><br></div>
  <div class="profile-item">bio</div>
  <div class="post-user"><td>{{ $users->bio }}</td><br></div>

  <td>
          <!-- ↓もしフォローしていたら、解除を表示する -->
          @if (auth()->user()->isFollowing($users->id))
            <form action="{{ route('unfollow',$users->id)}}" method="post"><!-- ルーティングのURLを表示させる -->
              @csrf
              <button type="submit" class="btn btn-info unfollow-btn" >フォロー解除</button>
            </form>
          @else
            <form action="{{ route('follow',$users->id)}}" method="post"><!-- ルーティングのURLを表示させる -->
              @csrf
              <button type="submit" class="btn btn-danger follow-btn">フォローする</button>
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
          <div><img src="{{ asset('storage/'.$users->images)}}" class="profile-image"></div>
          <div class="post-user"><td>{{ $users->username }}</td><br></div>
          <div class="v-post"><td>{{ $post->post }}</td><br></div>
          <div class="create-time"><td>{{ $post->created_at }}</td><br></div>
      </div>
    </div>
    <div class="b-color1"></div>
  </tr>
</div>
@endforeach

@endsection
