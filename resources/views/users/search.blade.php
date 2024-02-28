@extends('layouts.login')

@section('content')

<div class="search">
  <div>
    <form action="{{ URL::to('/search') }}" class="search-user" method="get">
      <input type="keyword" name="username" class="search-form" placeholder="ユーザー名">
      <button type="submit" class="search-btn"><img src="images/search.png"></button>
    </form>
  </div>

  <div class="search-word">
    @if (!empty($keyword))
    <p>検索ワード ： {{ $keyword }}</p>
    @endif
  </div>
</div>


<div class="b-color"></div>

<!-- 検索ワードの表示 -->
  <div class="search-list">
    @foreach($users as $users)
    <div class="user-list">
    @if(!($user->username == $users->username))

    <!-- 自分以外のユーザーの表示 -->
    <div class="search-member">
      @if($users->images == "icon1.png")
        <div><img src="{{ asset('/images/icon1.png')}}" class="profile-image"></div>
      @else
        <div><img src="{{ asset('storage/'.$users->images)}}" alt="ユーザーアイコン" width="50px" height="50px"></div>
      @endif

        <div>{{$users->username}}</div>

        <!-- フォローボタン -->
        <div class="search-followbtn">
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
        </div>
    </div>
    @endif
    </div>
    @endforeach
  </div>




@endsection
