@extends('layouts.login')

@section('content')

<div class="container">
    <form action="/top" method="post">
    {{ csrf_field() }}

    <div class="tweet">
        <img src="{{ asset( 'storage/' . Auth::user()->images) }}" class="tweet-icon" alt="icon">
        <textarea class="tweet-text" name="post" placeholder="投稿内容を入力してください。"></textarea>
        <input type="image" class="tweet-btn" name="submit" src="{{ asset('images/post.png') }}" alt="投稿">
    </div>
    </form>


        @if($errors->first('post'))
        <p class="post-errors">{{$errors->first('post')}}</p>
        @endif
        @foreach($posts as $post)
        <section class="tweet-box">
            <div class="list">
                <div class="post-list">
                <div class="list-images">
                    <img src="{{ asset( 'storage/' . Auth::user()->images) }}" class="tweet-icon" alt="icon">
                </div>
                <div class="posts">
                    <p class="nameAndDate-child name-child">{{ $post->user->username }}</p>
                    <p class="nameAndDate-child date-child">{{ $post->updated_at }}</p>
                    <p class="post">{{ $post->post }}</p>
                </div>
                </div>

                <div class="content tweet-wrapper-btn">
                    <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}" ><img src="{{ asset('images/edit.png') }}" alt="編集">
                    </a>
                        {{-- ララベル課題参考箇所 --}}
                    <td><a href="/post/{{$post->id}}/delete"><img src="{{ asset('images/trash-h.png') }}" class="trash-btn" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" alt="削除"></a></td>
                </div>

                <div class="follower-tweet">
                </div>
            </div>
            <div class="line bold-line"></div>
        </section>
        @endforeach

        @foreach ($followPost as $userImages)
            <div class="post-list">
                <div class="list-images">
                        <img src="{{ asset( 'storage/' . $userImages->user->images)}}" alt="" width="50" height="50" class="list-icon">
                </div>
                <div class="posts">
                    <div class="nameAndDate">
                    <p class="nameAndDate-child name-child">{{$userImages->user->username}}</p>
                    <p class="nameAndDate-child date-child">{{$userImages->updated_at}}</p>
                    </div>
                    <p class="post">{{$userImages->post}}</p>
                </div>
            </div>
        @endforeach


        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <form action="{{ route('posts.index') }}" method="POST">
                        @csrf
                        <textarea class="modal_post" name="upPost"></textarea>
                        {{-- <input type="hidden" name="id" class="modal_id" value="{{$post->id}}"> --}}
                        <input type="hidden" name="id" class="modal_id">
                        <div class="btn-zone">
                        <input type="image" src="{{ asset('images/edit.png') }}" class="edit-btn2 modal_id" value="更新" alt="更新">
                    </form>
                    <a class="js-modal-close close-btn" href="">閉じる</a>
                        </div>
                </div>
            </div>

  </div>
@endsection
