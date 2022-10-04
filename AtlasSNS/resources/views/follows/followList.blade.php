@extends('layouts.login')

@section('content')

<div class="container">
    <section class="Folow-List">
        <h1>Folow List</h1>
            <div class="list-images">
                @foreach ($followList as $user)
                <img src="{{ asset( 'storage/' . $user->images)}}" alt="icon" width="50" height="50" class="list">
                @endforeach
            </div>
    </section>

    <section class="Folow-posts">
            <div class="list-images">
                @foreach ($followList as $user)
                <img src="{{ asset( 'storage/' . $user->images)}}" alt="icon" width="50" height="50" class="list">


                <p>{{$user->post}}</p>

                @endforeach
            {{-- <div class="list-posts">
                <p>{{$user->post}}</p> --}}

        {{-- @foreach($posts as $post)
            <div class="tweet-box">
                <div class="tweet-wrapper">
                    <tr>
                        <td>{{ $post->user->username }}</td>
                        <td>{{ $post->post }}</td>
                    </div>
                @endforeach --}}
            </div>
            <div class="post-list">
                @foreach ($posts as $post)
                <p>{{$post->post}}</p>
                @endforeach
            </div>
    </section>

</div>
@endsection
