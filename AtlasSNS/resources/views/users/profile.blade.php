@extends('layouts.login')

@section('content')

<div class="container">
    {{-- <section class="follow-list">
            <div class="list-images">
                @foreach ($followImages as $userImages)
                <img src="{{ asset( 'storage/' . $userImages->images)}}" alt="" width="50" height="50" class="list-icon">
                @endforeach
            </div>
        </section> --}}

    <section class="follow-posts">
        @foreach ($followPost as $userImages)
        <div class="profile">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $userImages->user->images)}}" alt="" width="50" height="50" class="list-icon">
            </div>
            <div class="usersProfile">
                <p>{{$userImages->user->username}}</p>
                <p>{{$userImages->user->bio}}</p>
            </div>
        </div>
        <div class="bold-line"></div>
        <div class="post-list">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $userImages->user->images)}}" alt="" width="50" height="50" class="list-icon">
            </div>
            <div class="posts">
                <p>{{$userImages->user->username}}</p>
                <p>{{$userImages->post}}</p>
                <p>{{$userImages->updated_at}}</p>
            </div>
        </div>
    @endforeach
    </section>
</div>
@endsection
