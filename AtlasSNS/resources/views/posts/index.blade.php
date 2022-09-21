@extends('layouts.login')

@section('content')


<form action="/top" method="post">
{{ csrf_field() }}

<div class="tweet">
    <img src="{{ asset('images/icon1.png') }}" class="tweet-icon" alt="atlas">
    <textarea class="tweet-text" name="post" placeholder="投稿内容を入力してください。"></textarea>
    <input type="image" class="tweet-btn" name="submit" src="{{ asset('images/post.png') }}" alt="投稿">
</div>
</form>


    @if($errors->first('post'))
    <p class="post-errors">{{$errors->first('post')}}</p>
    @endif
    @foreach($posts as $post)
    <div class="tweet-box">
        <div class="tweet-wrapper">
            <tr>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->post }}</td>
            </tr>
            <div class="content tweet-wrapper-btn">
                <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}" ><img src="{{ asset('images/edit.png') }}" alt="編集">
                </a>
                    {{-- ララベル課題参考箇所 --}}
                <td><a href="/post/{{$post->id}}/delete"><img src="{{ asset('images/trash-h.png') }}" class="trash-btn" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" alt="削除"></a></td>
            </div>

            <div class="follower-tweet">
                {{-- @foreach($posts as $post)
                    <p>名前：{{ $post->user->username }}</p>
                    <p>投稿内容：{{ $post->post }}</p> --}}
                {{-- @endforeach --}}
            </div>
         </div>
    </div>
    @endforeach

     <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="{{ route('posts.index') }}" method="post">
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

@endsection
