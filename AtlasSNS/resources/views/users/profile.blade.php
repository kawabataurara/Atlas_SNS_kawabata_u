@extends('layouts.login')

@section('content')

<div class="container">

    <section class="follow-posts">
        <div class="profile">
            <div class="list-images">
                    <img src="{{ asset( 'storage/img/' . $data->images)}}" alt="" width="70" height="70" class="list-icon">
            </div>
            <div class="usersProfile">
                <p class="profileName">{{$data->username}}</p>
                <p class="profileBio">{{$data->bio}}</p>
            </div>

            {{-- フォローボタンの実装 --}}
        @if(Auth::user()->test($data->id))
            <form action="{{ route('UnFollow', ['id' => $data->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="login-next">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('follow', ['id' => $data->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="login-next">フォローする</button>
            </form>
        @endif
        </div>

        <div class="bold-line"></div>

        <section class="follow-posts">
            @foreach ($dataPost as $dataPost)
        <div class="post-list">
            <div class="list-images">
                @if ($data->images==='icon1.png')
                    <p><img src="{{ asset('images/icon1.png') }}" alt="icon"></p>
                @else
                    <p><img src="{{ asset( 'storage/img/' . $data->images)}}" alt="" width="50" height="50" class="list-icon"></p>
                @endif
            </div>

            <div class="posts">
                <p class="nameAndDate-child name-child">{{$dataPost->username}}</p>
                <p class="nameAndDate-child date-child">{{$dataPost->updated_at}}</p>
                <p class="post">{{$dataPost->post}}</p>
                </div>
            </div>
                <div class="line bold-line"></div>
            @endforeach
        </section>
    </section>
 </div>
@endsection
