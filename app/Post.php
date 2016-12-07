<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillable = ['content', 'is_tutorial'];

	public function user(){
        return $this->belongsTo('App\User', 'created_by');
	}
	
    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    // public function communities()
    // {
    // 	return $this->belongsToMany('App\Community', 'community_posts');
    // }
}
