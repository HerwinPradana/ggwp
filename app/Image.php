<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'post_images';
	
	public function post(){
        return $this->belongsTo('App\Post', 'post_id');
	}
}
