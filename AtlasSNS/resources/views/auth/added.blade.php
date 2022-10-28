@extends('layouts.logout')

@section('content')

<div class="added-all">
<div id="clear">
    <div class="added-list">
        <div class="added-main">
            <h1 class="added-name">{{ session('username') }}さん</h1>
            <h2 class="added-welcome">ようこそ！AtlasSNSへ！</h2>
        </div>
        <div class="added-sub">
            <p>ユーザー登録が完了しました。</p>
            <p>早速ログインをしてみましょう。</p>
        </div>
        </div>
  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>
</div>

@endsection
