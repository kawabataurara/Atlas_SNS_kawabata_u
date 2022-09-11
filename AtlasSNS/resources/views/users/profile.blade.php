@extends('layouts.login')

@section('content')

 {{-- <form method="POST" action="" enctype="multipart/form-data"> --}}
  {{-- <form route="profile/{id}/update" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }} --}}
{!! Form::open(['url' => 'profile/{id}/update']) !!}
    {!! Form::hidden('id', $auth->id) !!}


        <div class="user-profile">
            <p>{{Form::label('user-profile','ユーザー名')}}</p>
            <p>{{ Form::text('username',$auth->username,['class' => 'input']) }}</p>
        </div>

        <div class="user-profile">
            <p>{{Form::label('E-mail','メールアドレス')}}</p>
            <p>{{ Form::text('mail',$auth->mail,['class' => 'input']) }}</p>
        </div>

        <div class="user-profile">
            <p>{{Form::label('password','パスワード')}}</p>
            <p>{{ Form::password('password',null,['class' => 'input']) }}</p>
        </div>

        <div class="user-profile">
        <p>{{Form::label('password_confirmation','パスワード確認')}}</p>
        <p>{{ Form::password('password_confirmation',null,['class' => 'input']) }}</p>
        </div>

        <div class="user-profile">
        <p>{{Form::label('bio','自己紹介')}}</p>
        <p>{{ Form::text('bio',$auth->bio,['class' => 'input']) }}</p>
        </div>

        <div class="user-profile">
            <p>{{Form::label('images','アイコン')}}</p>
            <p>{{ Form::file('images',null,['class' => 'icon-images']) }}</p>
        </div>




        {{Form::submit('更新', ['class'=>'btn btn-primary btn-block'])}}
 {!! Form::close() !!}



@endsection
