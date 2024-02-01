<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- bootstrapの追加↓ -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div><a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png')}}" class="atlas-logo"></a></div>
        <div class="head">
            <div class="login-name menu-list">{{ Auth::user()->username }}             さん</div>
            <!-- ★ -->
            <div class="menu-btn menu-list"><span class="inn"></span></div>
            <div><img src="{{ asset('storage/'.Auth::user()->images) }}" class="profile-image menu-list"></div>
            <div class="menu">
                <ul>
                    <li><a class="accordion-menu"  href="{{ URL::to('/top') }}">HOME</a></li>
                    <li><a class="accordion-menu accordion-profile" href="{{ URL::to('/profile') }}">プロフィール編集</a></li>
                    <li><a class="accordion-menu"  href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
                <!-- ★ -->
    </header>

    <div id="row">
        <div id="container">
            @yield('content')

            <!-- <form>
                <input name="post" placeholder="投稿内容を入力してください。" >
            </form> -->

        </div>

        <div id="side-bar">
            <div id="confirm">
                <p class="follow-count">{{  Auth::user()->username }}さんの</p>
                <div class="follow-count">
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <a class="btn btn-primary follow-listbtn" href="{{ URL::to('/follow-list') }}" role="button">フォローリスト</a>
                <div class="follower-count">
                <p>フォロワー数</p>
                <p>{{ Auth::user()->follower()->count()}}名</p>
                </div>
                <a class="btn btn-primary follow-listbtn" href="{{ URL::to('/follower-list') }}" role="button">フォロワーリスト</a>
            </div>
            <div class="b-color1"></div>
            <div><a class="btn btn-primary user-search" href="/search" role="button">　ユーザー検索　</a></div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>


            <!-- ★ -->
            <!-- <div class="menu-list">
            <button type="button" class="menu-btn">///<span class="inn"></span></button>
                <ul>
                    <nav class="menu">
                        <li><a class="accordion-menu" href="/top">HOME</a></li>
                        <li><a class="accordion-menu" href="/profile">プロフィール編集</a></li>
                        <li><a class="accordion-menu" href="/logout">ログアウト</a></li>
                    </nav>
                </ul>
            </div> -->
