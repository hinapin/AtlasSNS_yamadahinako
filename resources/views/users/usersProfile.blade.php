@extends('layouts.login')

@section('content')



<div class="form-container">
  <div>
    <img src="{{ asset('storage/'.Auth::user()->images)}}" class="profile-image">
  </div>
  <td>
          <!-- ↓もしフォローしていたら、解除を表示する -->


              <!-- ルーティングのURLを表示させる -->

              <button type="submit" class="btn btn-info unfollow-btn" >フォロー解除</button>
            </form>


              <!-- ルーティングのURLを表示させる -->

              <button type="submit" class="btn btn-danger follow-btn">フォローする</button>
            </form>

        </td>




</div>

<div class="b-color"></div>


<div class="lists">
  <tr>
    <div class="contents">
      <div class="contents1">
          <div>
            <img src="{{}}" class="profile-image">
          </div>
          <div class="post-user"><td></td><br></div>
          <div class="v-post"><td></td><br></div>
          <div class="create-time"><td></td><br></div>
      </div>
    </div>
    <div class="b-color1"></div>
  </tr>
</div>

@endsection
