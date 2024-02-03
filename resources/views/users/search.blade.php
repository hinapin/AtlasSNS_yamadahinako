@extends('layouts.login')

@section('content')

<div class="search">
  <div class="search-user">
    <form action="{{ url('/search') }}" method="get">
      <input type="keyword" name="username" class="search-form" placeholder="ユーザー名">
    </form>

    <button type="submit" class="search-btn"><img src="images/search.png"></button>
  </div>

  <div class="search-word">
    @if (!empty($keyword))
    <p>検索ワード: {{ $keyword }}</p>
    @endif
  </div>
</div>


<div class="b-color"></div>

<!-- 検索ワードの表示 -->
  <table class="search-list">
    @foreach($users as $users)
    <div class="user-list">
    @if(!($user->username == $users->username))
    <!-- 自分以外のユーザーの表示 -->
      <tr>
        <td><img src="{{ asset('storage/'.$users->images)}}" alt="ユーザーアイコン" width="50px" height="50px"></td>
        <td>{{$users->username}}</td>
        <!-- フォローボタン -->
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
      </tr>
    @endif
    </div>
    @endforeach
  </table>




@endsection
