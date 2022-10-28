@extends('layouts.logout')

@section('content')

{!! Form::open() !!}



<div class="logout-container">

<p class="label-text">{{ Form::label('e-mail') }}</p>
<p>{{ Form::text('mail',null,['class' => 'input']) }}</p>


<p class="label-text">{{ Form::label('password') }}</p>
<p>{{ Form::password('password', ['class' => 'input']) }}</p>

@error('password')
   <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
   </span>
@enderror

{{-- <p>{{ Form::submit('ログイン')}}</p> --}}
<div class="login-next">
    <div class="login-btn-img">{{ Form::image("images/loginbtn.png")}}</div>
</div>

<p class="new-user"><a href="/register" class="new-user-design">新規ユーザーの方はこちら</a></p>

</div>
{!! Form::close() !!}



@endsection
