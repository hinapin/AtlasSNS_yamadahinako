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
        <div id ="head">
            <h1><a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png')}}" class="atlas-logo"></a></h1>

            <div id="header-container">
                <div id="login-name"><p>{{ Auth::user()->username }}さん</p><div>
                    <div class="menu-list">
                    <btn class="menu-btn">////</btn>
                        <ul class="menu">
                            <li><a class="accordion-menu" href="/top">HOME</a></li>
                            <li><a class="accordion-menu" href="/profile">プロフィール編集</a></li>
                            <li><a class="accordion-menu" href="/logout">ログアウト</a></li>
                        </ul>
                    <div><img src="{{ asset('/images/icon1.png') }}" class="profile-image"></div>
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')

            <!-- <form>
                <input name="post" placeholder="投稿内容を入力してください。" >
            </form> -->

        </div >

        <div id="side-bar">
            <div id="confirm">
                <p>{{  Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <a class="btn btn-primary" href="/follow-list" role="button">フォローリスト</a>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <a class="btn btn-primary" href="/follower-list" role="button">フォロワーリスト</a>
            </div>
             <div class="b-color1"></div>
            <a class="btn btn-primary" href="/search" role="button">ユーザー検索</a>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
