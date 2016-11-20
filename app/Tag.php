<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public $timestamps = true;

    protected $fillable = ['name', 'color'];
}
