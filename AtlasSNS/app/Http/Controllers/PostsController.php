<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {

        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));

        // return view('posts.index');
    }

    // Requestはpostリクエストを取得するためのもの
    public function postTweet(Request $request)
    {
        // バリデーションの実装
        $validator = $request->validate([
            'post' => ['required', 'max:200']
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

    public function show()
    {
        // Postモデル経由でpostsテーブルのレコードを取得
        $posts = Post::get();
        return view('posts.index', compact('posts'));

}

//     public function show(){
// // フォローしているユーザーのidを取得
//   $following_id = Auth::user()->follows()->pluck('id');

// // フォローしているユーザーのidを元に投稿内容を取得
//   $posts = Post::with('user')->whereIn('follows', $following_id)->get();

//   return view('yyyy', compact('posts'));
// }

}
