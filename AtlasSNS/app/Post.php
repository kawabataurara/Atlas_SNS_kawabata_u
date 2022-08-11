<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [   // <---2022/6/4/追加
        'user_id', 'post',
    ];

    public function user() {
        return $this->belongsTo('\App\User');
    }
}
