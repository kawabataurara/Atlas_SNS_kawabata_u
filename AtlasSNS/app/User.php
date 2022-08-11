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
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follows() {
        // return $this->hasMany(\App\Follow::class, 'username', 'id');
        return $this->hasMany('\App\Follow');
    }

    //このユーザがフォローしている人を取得
    public function followings()
        {
            return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id')->withTimestamps();
        }

    //このユーザをフォローしている人を取得
    public function followers()
        {
            return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id')->withTimestamps();
        }

        public function follow_each(){
        //ユーザがフォロー中のユーザを取得
        $userIds = $this->followings()->pluck('users.id')->toArray();
       //相互フォロー中のユーザを取得
        $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
       //相互フォロー中のユーザを返す
        return $follow_each;
    }

    // 8/11追加
     

}
