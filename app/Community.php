<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model{

    public function tags(){
        return $this->belongsToMany('App\Tag', 'community_tags');
    }
}
