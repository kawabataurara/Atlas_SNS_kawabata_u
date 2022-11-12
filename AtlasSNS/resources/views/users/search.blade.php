@extends('layouts.login')

@section('content')


<div class="container">
    <main class="search-all">
        <section class="user-search">
            <form action="{{ route('users.search') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
            <div class="search-after">
                <p>検索ワード：{{ $keyword }}</p>
            </div>
        </section>


        @foreach ($users as $user)
        <section class="search">
    <div class="user-list-box">
        @if($user->id !== Auth::user()->id)
        <div class="search-list">
            <tr>
                @if ($user->images==='icon1.png')
                    <p><img src="{{ asset('images/icon1.png') }}" class="tweet-icon" alt="icon"></p>
                @else
                    <p><img src="{{ asset( 'storage/img/' . $user->images)}}" alt="icon" class="tweet-icon"></p>
                @endif
                <td><a href="{{ route('users.search' , $user->id) }}"class="after-search">
                    {{ $user->username }}
                </td></a>
            </tr>
        </div>
        </div>


        {{-- 空だったら --}}
        @if($users->isEmpty())
        <td>No user</td>
        @endif

        {{-- フォロー機能の実装 --}}

     @if(Auth::user()->test($user->id))
        <form action="{{ route('UnFollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="by">フォロー解除</button>
        </form>
        @else


        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
                <button type="submit" class="follow-btn">フォローする</button>
            </form>
            @endif
    @endif

    </section>
    @endforeach


</main>
</div>
@endsection
