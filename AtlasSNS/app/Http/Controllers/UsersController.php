<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
        }

    // public function search(){
    //     return view('users.search');
    // }

    public function search(Request $request){
        // return view('users.search');

        $keyword = $request->input('keyword');

        $query = User::query();

        if(!empty($keyword)) {
            $query->
            where('username', 'LIKE', "%{$keyword}%");
                // ->orWhere('username', 'LIKE', "%{$keyword}%");
        }

        $users = $query->get();

        return view('users.search', compact('users', 'keyword'));
    }

    // 8/14記述
        // フォロー
    public function follow(User $user)
    {
        dd($user);
        // $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
}
