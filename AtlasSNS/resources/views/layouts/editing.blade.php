@extends('layouts.login')

@section('content')

<div class="container">
    <section class="editing-all">
        {!! Form::open(['url' => 'editing/{id}/update', 'method' => 'post', 'files' => true]) !!}

        {!! Form::hidden('id', $auth->id) !!}

        <div class="editing-user-icon">
           <img src="{{ asset( 'storage/' . Auth::user()->images) }} " width="100" height="100" alt="icon">
        </div>

            <div class="editing-list">
                <div class="user-profile">
                    <p>{{Form::label('user-profile','ユーザー名')}}</p>
                    <p>{{ Form::text('username',$auth->username,['class' => 'input']) }}</p>

                    @error('username')
                        <li>{{$message}}</li>
                    @enderror
                </div>

                <div class="user-profile">
                    <p>{{Form::label('E-mail','メールアドレス')}}</p>
                    <p>{{ Form::text('mail',$auth->mail,['class' => 'input']) }}</p>

                    @error('mail')
                        <li>{{$message}}</li>
                    @enderror
                </div>

                <div class="user-profile">
                    <p>{{Form::label('password','パスワード')}}</p>
                    <p>{{ Form::password('password',null,['class' => 'input']) }}</p>

                    @error('password')
                        <li>{{$message}}</li>
                    @enderror
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
                    <p>{{ Form::file('images',null,['class' => 'icon-images', 'name' => 'images' ]) }}</p>
                </div>
            </div>

    </section>

            {{Form::submit('更新', ['class'=>'btn btn-primary btn-block'])}}
    {!! Form::close() !!}


</div>
@endsection
