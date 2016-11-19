<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Tag;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use Helpers;

    public function index()
	{
	    $currentUser = JWTAuth::parseToken()->authenticate();
	    $tag 		 = new Tag();
	    return $tag
	    	->orderBy('created_at', 'desc')
	    	->get()
	    	->toArray();
	}
}
