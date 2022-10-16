<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    //
    // public function followList(){
    //     return view('follows.followList');
    // }


    public function followList()
    {
        $followImages = Auth::user()->follows()->get();
        $followList = Auth::user()->follows()->pluck('followed_id');
        $followPost = Post::with('user')->whereIn('user_id', $followList)->latest()->get();

        return view('follows.followList', compact('followImages','followPost'));
        // compact→変数を送れる
        }

    public function followerList()
    {
        $followerImages = Auth::user()->followers()->get();
        $followerList = Auth::user()->followers()->pluck('following_id');
        $followerPost = Post::with('user')->whereIn('user_id', $followerList)->latest()->get();

        return view('follows.followerList', compact('followerImages','followerPost'));

            // compact→変数を送れる
        }
    }
