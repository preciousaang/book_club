<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',        
        'user_id',
        'slug'
    ];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
