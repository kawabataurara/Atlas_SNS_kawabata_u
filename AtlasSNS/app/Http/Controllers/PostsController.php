<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

class PostsController extends Controller
{
    //
    public function index()
    {

        // $posts = Post::latest()->get();
        // return view('posts.index', compact('posts'));
        $posts = Post::where('user_id', \Auth::user()->id)->get();
        $followImages = Auth::user()->follows()->get();
        $followList = Auth::user()->follows()->pluck('followed_id');
        $followPost = Post::with('user')->whereIn('user_id', $followList)->latest()->get();

        // $postsと$followPostを組み合わせて表示できないものか...？

        return view('posts.index', compact('posts', 'followImages','followPost'));
        // compact→変数を送れる

    }

    // Requestはpostリクエストを取得するためのもの
    public function postTweet(Request $request)
    {
        // バリデーションの実装
        $validator = $request->validate([
            'post' => ['required', 'max:200'],
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $request->post,
        ]);
        return back();

    }

     public function delete($id)
     {
        \DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('index');
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
        ->where('id', $id)
        ->update(
            ['post' => $up_post]
        );
        return redirect('index');

    }


}
