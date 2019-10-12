<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use sluggable;
    
    protected $fillable = [
        'category_id',
        'author',
        'cover_image',  
        'purchase_link',
        'title',
        'slug'
    ];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
