<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
    ];

    

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
   }



}
