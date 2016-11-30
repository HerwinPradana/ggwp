<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'user_id', 'is_tutorial'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    // public function communities()
    // {
    // 	return $this->belongsToMany('App\Community', 'community_posts');
    // }
}
