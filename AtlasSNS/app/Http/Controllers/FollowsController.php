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
            $followList = Auth::user()->follows()->get();
            // return view('follows.followList', compact('followList, posts'));
            return view('follows.followList', compact('followList'));

            // compact→変数を送れる
        }
    public function followPost()
    {
            $followList = Auth::user()->follows()->get();
            $posts = Post::with('user')->whereIn('id', $followList)->get();
            dd($posts);
            // return view('follows.followList', compact('followList, posts'));
            return view('follows.followList', compact('posts'));

            // compact→変数を送れる
        }

        // public function followerList(){
        //     return view('follows.followerList');
        // }

    }
