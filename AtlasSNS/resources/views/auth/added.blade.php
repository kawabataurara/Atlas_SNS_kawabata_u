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

</div>
</div>
 <div class="login-next">
    <div class="login-btn-img"><a href="/login">{{ Form::image("images/loginbtn.png")}}</a>
    </div>

@endsection
