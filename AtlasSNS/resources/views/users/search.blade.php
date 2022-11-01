@extends('layouts.login')

@section('content')


<div class="container">
    <main class="search-all">
        <section class="user-search">
            <form action="{{ route('users.search') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </section>


        @foreach ($users as $user)
        <section class="search">
    <div class="user-list-box">
        @if($user->id !== Auth::user()->id)
        <div class="search-list tweet-icon">
            <tr>
                <img src="{{ asset( 'storage/' . $user->images)}}" alt="icon">
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


    @endsection
</main>
</div>
