<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;




class UsersController extends Controller{
    //  public function validator(array $data){
    //     return Validator::make($data, [
    //         'username' => 'required | string | min:2 | max:12',
    //         'mail' => 'required | string | email | min:5 | max:40 | unique:users,mail',
    //         'password' => 'required | string | min:8 |  max:20 | confirmed | alpha_num',
    //         'password_confirmation' => 'required | same:password',
    //     ]);

    // }

    public function profile(){
        $auth = Auth::user();
        return view('users.profile',[ 'auth' => $auth ]);
    }
    protected function createProfile(array $data){
        return User::create([
            'bio' => $data['bio']
        ]);
    }

    public function update(Request $request){
        // if($request->isMethod('post')){
        //     $data = $request->input();
        //     $validator = $this->validator($data);
        // }
            // バリデーションが失敗したら
        // if ($validator->fails()) {
        // return redirect('/profile')
        //     ->withErrors($validator)
        //     -> withInput();
        // }
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->input('images');
        \DB::table('users')
        ->where('id', $id)
        ->update(
            ['username' => $username],
            ['mail' => $mail],
            ['password' => $password],
            ['bio' => $bio],
            ['images' => $images]
        );
        // $this->create($data);
        return redirect('profile');

    }






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
        dd($user->id);
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
