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
        @foreach($followPost as $followData)
        <main class="main">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $followData->user->images) }}" class="tweet-icon listi-con" alt="icon">
                </div>
        <section class="tweet-list">
            {{-- <div class="list"> --}}

                <div class="post-list">
                {{-- <div class="list-images">
                    <img src="{{ asset( 'storage/' . $followData->user->images) }}" class="tweet-icon listi-con" alt="icon">
                </div> --}}
                <div class="posts">
                    <div class="posts-top">
                    <p class="nameAndDate-child name-child">{{ $followData->user->username }}</p>
                    <p class="nameAndDate-child date">{{ $followData->updated_at }}</p>
                    </div>
                    <div class="post">{{ $followData->post }}</div>
                </div>
                </div>
                @if ($followData->user_id === Auth::user()->id)
                    <div class="tweet-wrapper-btn">
                        <div><a class="js-modal-open" post="{{ $followData->post }}" post_id="{{ $followData->id }}" ><img src="{{ asset('images/edit.png') }}" alt="編集"></div>
                        </a>
                            {{-- ララベル課題参考箇所 --}}
                        <div><a class= "js-modal-open" href="/post/{{$followData->id}}/delete"><img src="{{ asset('images/trash-h.png') }}" class="trash-btn " onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" alt="削除"></a></div>
                    </div>
                @endif


                <div class="follower-tweet">
                </div>
            {{-- </div> --}}
        </section>
        {{-- <div class="line bold-line"></div> --}}
        </main>
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
                        <input type="image" src="{{ asset('images/edit.png') }}" class="edit-btn modal_id" value="更新" alt="更新">
                    </form>
                    <a class="js-modal-close close-btn " href="">閉じる</a>
                        </div>
                </div>
            </div>

  </div>
@endsection
