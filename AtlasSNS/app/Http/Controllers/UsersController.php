<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;
use Illuminate\Support\Facades\Validator;




class UsersController extends Controller
{
    //  public function validator(array $data){
    //     return Validator::make($data, [
    //         'username' => 'required | string | min:2 | max:12',
    //         'mail' => 'required | string | email | min:5 | max:40 | unique:users,mail',
    //         'password' => 'required | string | min:8 |  max:20 | confirmed | alpha_num',
    //         'password_confirmation' => 'required | same:password',
    //     ]);

    // }

    public function profile()
    {
        $auth = Auth::user();
        return view('users.profile',[ 'auth' => $auth ]);
    }

    protected function createProfile(array $data) {
        return User::create([
            'bio' => $data['bio']
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');

        // もし画像があれば
        if($request->hasFile('images')){
        $path = $request->file('images')->store('public');
        // $user->images = basename($path);
        \DB::table('users')
        ->where('id', $id)
        ->update(
            ['images' => basename($path)
            ]);
        }

        \DB::table('users')
        ->where('id', $id)
        ->update(
            ['username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
        ]);

        return redirect('profile');

    }





    public function search(Request $request)
    {
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
    public function follow($id)
    {
        // dd($id);
        // $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
        }
    }

    // フォロー解除
    public function UnFollow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->UnFollow($id);
            return back();
        }
    }


    // public function FollowList()
    // {

    //     User::query()->get();
    //     // $users = $query->get();

    //     return view('follows.followList');
    // }

    // public function followList($id)
    // {
    //     // dd($id);
    //     // $user = User::find($id);
    //     $follower = auth()->user();
    //     // フォローしているか
    //     $is_following = $follower->isFollowing($id);
    //     $queryList = User::query();
    //      if($is_following) {
    //         // フォローしていれば返す
    //          $follower->get($id);
    //         return view('follow.followList');
    //     }

    // }

}
