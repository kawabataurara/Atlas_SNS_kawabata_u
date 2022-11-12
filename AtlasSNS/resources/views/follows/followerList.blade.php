@extends('layouts.login')

@section('content')

<div class="container">
    <section class="follow-list">
        <h1 class="title">follower List</h1>
            <div class="list-images">
                @foreach ($followerImages as $userImages)
                 <a href="/user/{{$userImages->id}}/profile" ><img src="{{ asset( 'storage/' . $userImages->images)}}" alt="" width="50" height="50" class="list-icon top-icon"></a>
                @endforeach
            </div>
        </section>
        <div class="bold-line"></div>

    <section class="follow-posts">
            @foreach ($followerPost as $userImages)
            <div class="post-list">
                <div class="list-images">
                    @if ($userImages->user->images==='icon1.png')
                        <p><img src="{{ asset('images/icon1.png') }}" alt="icon"></p>
                    @else
                        <img src="{{ asset( 'storage/img/' . $userImages->user->images)}}" alt="" width="60" height="60" class="list-icon">
                    @endif
                </div>
                <div class="posts">
                    <div class="nameAndDate">
                    <p class="nameAndDate-child name-child">{{$userImages->user->username}}</p>
                    <p class="nameAndDate-child date-child">{{$userImages->updated_at}}</p>
                    </div>
                    <p class="post">{{$userImages->post}}</p>
                </div>
            </div>
            <div class="line"></div>
        @endforeach

    </section>
</div>
@endsection
