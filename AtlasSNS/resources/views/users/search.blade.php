@extends('layouts.login')

@section('content')



<div>
    {{-- <form action="/top" method="post"> --}}
  <form action="{{ route('users.search') }}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>


@foreach ($users as $user)
   <div class="user-list-box">
    <div class="search-list">
        <tr>
            <img src="{{ asset('images/icon2.png') }}" alt="ユーザーアイコン">
            <td><a href="{{ route('users.search' , $user->id) }}"class="after-search">{{ $user->username }}
            {{-- {{ $user->images }} --}}
            </td></a>
            {{-- <td>{{ $user->username }}</td> --}}
        </tr>

        {{-- 空だったら --}}
        @if($users->isEmpty())
        <td>No user</td>
        @endif

        {{-- フォロー機能の実装 --}}
        {{-- 多対多の記述？ --}}
        @if(in_array($user->id,Auth::user()->follow_each()))
         {{-- @if (auth()->user()->isFollowing($user->id)) --}}


        {{-- フォロー機能の実装の終了タグ --}}

        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
        {{-- <form action="" method="POST"> --}}
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <a href="{{route('unfollow', $user)}}" class="search-follow">
                <button type="submit"></button>フォロー解除</button></a>
        </form>
        @else


    </div>
    {{-- <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST"> --}}
        {{ csrf_field() }}
        {{-- <div class= "users-follow-btn"> --}}
            <a href="{{route('follow', $user)}}" class="search-follow">
                <button type="submit">フォローする</button></a>
            {{-- </div> --}}
        </form>
        @endif
    </div>
</div>

@endforeach







@endsection
