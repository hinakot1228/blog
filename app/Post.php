<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // PostとUserテーブルの連結
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}

// UserとPostテーブルの関係
// １対多
// User：親
// Post：子