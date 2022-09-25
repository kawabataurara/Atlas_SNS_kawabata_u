@extends('layouts.login')

@section('content')
<form action="/top" method="post">

{{-- @foreach ($users as $user) --}}
    <section class="Folow-List">
        <h1>Folow List</h1>

        {{-- フォローリストのアイコンの表示を絞るためにはforeachの実装が必要？？search.blade.phpを参考に --}}
         {{-- @foreach ($all_users as $user) --}}

            {{-- <img src="{{ asset( 'storage/' . Auth::user()->images) }} " alt="icon"> --}}

         @if(Auth::user()->test($user->id))
        {{-- フォロー機能の実装の終了タグ --}}

        <form action="{{ route('UnFollow', ['id' => $user->id]) }}" method="POST">
        {{-- <form action="" method="POST"> --}}
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            {{-- <a href="{{route('UnFollow', $user)}}" class="search-follow"> --}}
                <button type="submit">フォロー解除</button>
            {{-- </a> --}}
        </form>
        @else



    </div>
    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
            <button type="submit">フォローする</button>
        </form>
        @endif
    </div>
   @endif

             <p><img src="{{ asset( 'storage/' . Auth::user()->images) }}" alt="icon"></p>
    </section>


{{-- @endforeach --}}
@endsection
