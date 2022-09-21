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
                    {{-- <img src="{{ Auth::user()->images }} " alt="icon1"> --}}
                    <img src="{{ asset( 'storage/' . Auth::user()->images) }} " alt="icon">
                    </div>
                        <div class="menu">
                            <div class="sp-menu">
                                <span class="material-symbols-outlined" id="open">expand_more</span>
                             </div>
                 </div>
                  </div>
                   </div>

                            <div class="overlay">
                                    <span class="material-icons" id="close">close</span>
                                            <nav>
                                                <ul>
                                                    <li><a href="/top">ホーム</a></li>
                                                    <li><a href="/profile">プロフィール編集</a></li>
                                                    <li><a href="/logout">ログアウト</a></li>
                                                </ul>
                                            </nav>
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
                         <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                         <script src="{{ asset('/js/login.js') }}"></script>
                    </body>
                    </html>
