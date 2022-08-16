@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p><img src="images/welcome.png" class="welcome-img"></p>

<div class="logout-container">

<p class="label-text">{{ Form::label('e-mail') }}</p>
<p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
<p class="label-text">{{ Form::label('password') }}</p>
<p>{{ Form::password('password',['class' => 'input']) }}</p>

{{-- <p>{{ Form::submit('ログイン')}}</p> --}}
<div class="login-next">
    <div class="login-position">
{{-- <p class="login-btn">{{ Form::image("images/loginbtn.png")}}</p> --}}
<p class="login-btn">{{ Form::submit("")}}</p>
<img src="images/loginbtn.png"class="login-btn-img">
<img src="images/next.png" class="next-img">
</div>
</div>

<p class="new-user"><a href="/register" class="new-user-design">新規ユーザーの方はこちら</a></p>

</div>
{!! Form::close() !!}



@endsection
