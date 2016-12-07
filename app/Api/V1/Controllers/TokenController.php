<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TokenController extends Controller{

    use Helpers;

    private function currentUser() {
        return JWTAuth::parseToken()->authenticate();
    }

    public function checkToken(){
    	$this->currentUser();
        
        $response = new \stdClass();
        return json_encode($response);
    }
}
