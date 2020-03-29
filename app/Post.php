<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{    use Sluggable;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); //will get the userid where post in on view
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}