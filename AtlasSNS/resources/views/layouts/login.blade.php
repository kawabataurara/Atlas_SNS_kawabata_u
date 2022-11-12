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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
        <div id="head">
            <div id="head-design">
                <h1 class="logo-img"><a href="/top"><img src="{{ asset('images/atlas.png') }}" alt="atlas"></a></h1>
            </div>
                <div class="header-list">
                    <div class="user-profile">
                    <p class="username-box">{{ Auth::user()->username }}さん</p>

                    @if (Auth::user()->images=='icon1.png')
                     <p><img src="{{ asset('images/icon1.png') }}" class="header-icon" alt="icon"></p>
                    @else
                     <img src="{{ asset( 'storage/img/' . Auth::user()->images) }}" class="header-icon" alt="icon">
                     @endif

                         <section class="menu-all">
                        <p class="menu-open" id="open"></p>
                            <div class="overlay">
                                <nav>
                                    <ul>
                                        <a href="/top"><li>ホーム</li></a>
                                    <a href="/editing"><li>プロフィール編集</li></a>
                                        <a href="/logout"><li>ログアウト</li></a>
                                    </ul>
                                </nav>
                             </div>
                            </section>
                        </div>
                    </div>
                 </div>
                  </div>
                   </div>
                        </header>
                        <div id="row">
                            <div id="container">
                                @yield('content')
                            </div >
                                @include('layouts.sidebar')


                        </div>
                        <footer>
                        </footer>
                        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                         <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                         <script src="{{ asset('/js/login.js') }}"></script>
                    </body>
                    </html>
