@extends('layouts.login')

@section('content')

<div class="container">

    <section class="follow-posts">
        <div class="profile">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $data->images)}}" alt="" width="50" height="50" class="list-icon">
            </div>
            <div class="usersProfile">
                <p class="profileName">{{$data->username}}</p>
                <p class="profileBio">{{$data->bio}}</p>
            </div>

            {{-- フォローボタンの実装 --}}
            @if(Auth::user()->followed_id === $data->id)

        <form action="{{ route('profile.UnFollow') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
                <button type="submit">フォロー解除</button>
        </form>
        @else

        <form action="{{ route('profile.follow') }}" method="POST">
        {{ csrf_field() }}
            <button type="submit">フォローする</button>
        </form>
        @endif

        </div>
        <div class="bold-line"></div>
        <div class="post-list">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $data->images)}}" alt="" width="50" height="50" class="list-icon">
            </div>
            @foreach ($dataPost as $dataPost)
                <div class="posts">
                    <p>{{$dataPost->username}}</p>
                    <p>{{$dataPost->post}}</p>
                    <p>{{$dataPost->updated_at}}</p>
                </div>
            @endforeach
        </div>
    </section>
 </div>
@endsection
