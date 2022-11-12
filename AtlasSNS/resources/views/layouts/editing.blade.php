@extends('layouts.login')

@section('content')

<div class="container">
    <section class="editing-all">
        {!! Form::open(['url' => 'editing/{id}/update', 'method' => 'post', 'files' => true]) !!}

        {!! Form::hidden('id', $auth->id) !!}

        <div class="editing-user-icon">
            @if (Auth::user()->images=='icon1.png')
                <p><img src="{{ asset('images/icon1.png') }}" alt="icon"></p>
            @else
                <img src="{{ asset( 'storage/img/' . Auth::user()->images) }} " width="100" height="100" alt="icon">
            @endif

        </div>

            <div class="editing-list">
                <div class="user-profile">
                    <p>{{Form::label('user-profile','ユーザー名')}}</p>
                    <p class="editing-input">{{ Form::text('username',$auth->username,['class' => 'input']) }}</p>

                </div>

                <div class="error">
                    @error('username')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="user-profile">
                    <p>{{Form::label('E-mail','メールアドレス')}}</p>
                    <p class="editing-input"> {{ Form::text('mail',$auth->mail,['class' => 'input']) }}</p>

                </div>
                <div class="error">
                        @error('mail')
                            <p>{{$message}}</p>
                        @enderror
                    </div>

                <div class="user-profile">
                    <p>{{Form::label('password','パスワード')}}</p>
                    <p class="editing-input">{{ Form::password('password',null,['class' => 'input']) }}</p>

                </div>
                <div class="error">
                        @error('password')
                            <p>{{$message}}</p>
                        @enderror
                    </div>

                <div class="user-profile">
                <p>{{Form::label('password_confirmation','パスワード確認')}}</p>
                <p class="editing-input">{{ Form::password('password_confirmation',null,['class' => 'input']) }}</p>
                </div>

                <div class="user-profile">
                <p>{{Form::label('bio','自己紹介')}}</p>
                <p class="editing-input">{{ Form::text('bio',$auth->bio,['class' => 'input']) }}</p>
                </div>

                <div class="user-profile">
                    <p>{{Form::label('images','アイコン')}}</p>
                    <p class="profile-editing-icon">{{ Form::file('images',null,['class' => 'icon-images', 'name' => 'images' ]) }}</p>
                </div>
            </div>


            <button>{{Form::submit('更新', ['class'=>'btn btn-primary btn-block'])}}</button>
            {!! Form::close() !!}
        </section>


</div>
@endsection
