<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">
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
{{-- <div class="atlas-logout-box"></div> --}}
<body>
    <div class="atlas-box">
        {{-- <div><img src="images/cloud.png" class="heart-img"></div>
        <div><img src="images/cloud.png" class="heart-img"></div>
        <div><img src="images/cloud.png" class="heart-img"></div> --}}
        <div><img src="images/angel.png" class="angel up-down"></div>

        <header>
            <h1><a href="/login"><img src="images/atlas.png" class="logout-atlas"></h1></a>
            {{-- <p>Social Network Service</p> --}}
        </header>
    </div>

  <div id="container">
    @yield('content')
  </div>
  <script src="JavaScriptファイルのURL"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>
</html>
