@extends('layouts.logout')

@section('content')

<div class="logout-container register-body">

{!! Form::open() !!}

{{-- <h2>新規ユーザー登録</h2> --}}

<p class="label-text">{{ Form::label('ユーザー名') }}</p>
{{ Form::text('username', null, ['class' => 'input', 'placeholder' =>'アトラス新一']) }}

@error('username')
  <p class="error">{{$message}}</p>
@enderror

<p class="label-text">{{ Form::label('メールアドレス') }}</p>
{{ Form::text('mail',null,['class' => 'input', 'placeholder' =>'shinichi@atlas.com']) }}

@error('mail')
  <p class="error">{{$message}}</p>
@enderror

<p class="label-text">{{ Form::label('パスワード') }}</p>
{{ Form::text('password',null,['class' => 'input', 'placeholder' =>'tuyosounayatu123']) }}

@error('password')
  <p class="error">{{$message}}</p>
@enderror


<p class="label-text">{{ Form::label('パスワード確認') }}</p>
{{ Form::text('password_confirmation',null,['class' => 'input', 'placeholder' =>'tuyosounayatu123']) }}



<div class="login-next register-btn">
<div class="login-position">
    <div class="register-btn-img">{{ Form::image("images/registerbtn.png")}}</div>
</div>
</div>

<p><a href="/login" class="new-user-design">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>


@endsection
