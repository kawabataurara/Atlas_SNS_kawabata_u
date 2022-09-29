<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function follows() {
    //     return $this->hasMany('\App\Follow');
    // }

    //このユーザがフォローしている人を取得
    public function follows()
        {
            return $this->belongsToMany(User::class, 'follows', 'following_id','followed_id')->withTimestamps();
        }


    //このユーザをフォローしている人を取得
    public function followers()
        {
            return $this->belongsToMany(User::class, 'follows', 'followed_id','following_id')->withTimestamps();
        }

        // 9/25この記述いらない疑惑なので、コメントアウトした
    //     public function follow_each(){
    //     //ユーザがフォロー中のユーザを取得
    //     $userIds = $this->follows()->pluck('users.id')->toArray();
    //     //相互フォロー中のユーザを取得
    //     $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
    //    //相互フォロー中のユーザを返す
    //     return $follow_each;
    // }
        // ---ここまで---


        public function test($user_id){
            return (boolean) $this->follows()->where('followed_id', $user_id)->first();

        }



    // 8/14記述
    // フォローする
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function UnFollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    }


    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }

    //  public function followList($user_id){
    //         return (boolean) $this->follows()->where('followed_id', $user_id)->first();

    //     }

     

}
