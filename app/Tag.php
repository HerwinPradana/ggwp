<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public $timestamps = true;

    protected $fillable = ['name', 'color'];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tags');
    }
}
