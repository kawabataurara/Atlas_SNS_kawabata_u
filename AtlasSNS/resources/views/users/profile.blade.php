@extends('layouts.login')

@section('content')

<div class="profole-list">

    <div class="user-profole">
     <p>user  name</p>
     {{-- <input type="text" value="{{$post->username}}"> --}}
    </div>
    <div class="user-profole">
     <p>mail  adress</p>
    </div>
    <div class="user-profole">
     <p>passwprd</p>
    </div>
    <div class="user-profole">
     <p>passwprd comfirm</p>
    </div>
    <div class="user-profole">
     <p>bio</p>
    </div>
    <div class="user-profole">
     <p>icon  image</p>
    </div>

</div>

@endsection
