<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'thread_id',
        'content',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function thread(){
        return $this->belongsTo('App\Thread');
    }
}
