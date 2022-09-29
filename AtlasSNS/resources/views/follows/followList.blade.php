@extends('layouts.login')

@section('content')
{{-- <form action="/top" method="post"> --}}

    <section class="Folow-List">
        <h1>Folow List</h1>

        {{-- <section>
            <div class="">{{ Auth::user()->images }}</div>
        </section> --}}

  {{-- <form action="{{ route('follows.followList') }}" method="POST"> --}}
    {{-- {{ csrf_field() }} --}}
    {{-- @foreach ($is_following as $user) --}}
    {{-- @foreach ($query as $followList) --}}
         {{-- @if(Auth::user()->isFollowing($user->id)) --}}
          {{-- <form action="{{ route('UnFollow') }}" method="POST"> --}}
        {{-- <form action="" method="POST"> --}}
            {{-- {{ csrf_field() }} --}}
         {{-- @endif --}}
      <form action="{{ route('follows.followList') }}" method="POST">
      @foreach ($follower as $user)
        @if(Auth::user()->test($user->id))
          <form action="{{ route('UnFollow', ['id' => $user->id]) }}" method="POST">
        {{-- <form action="" method="POST"> --}}
            {{ csrf_field() }}
            {{-- @if(Auth::user()->followList()) --}}
            <img src="{{ asset( 'storage/' . Auth::user()->images) }} " alt="icon">
            @endif



    <div class="">
        {{-- @if($user->id !== Auth::user()->id) --}}
        <div class="">
            {{-- <tr>
                <img src="{{ asset('images/icon2.png') }}" alt="ユーザーアイコン">
                <td><a href="{{ route('follows.followList', Auth::user()->query()->get()->images) }}"class="">
                    {{-- {{ $followList->images }} --}}
                    {{-- {{User::query()->get();}}
                </td></a>
            </tr> --}}

    {{-- @endforeach --}}
    @endforeach
    @endsection
