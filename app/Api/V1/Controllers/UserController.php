<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller{

    use Helpers;

    private function currentUser(){
        return JWTAuth::parseToken()->authenticate();
    }

    public function profile(Request $request){
        $this->currentUser();
        
	    $response = new \stdClass();
	    $response->result = User::find($request->get('id'));

	    return response()->json($response);
    }
}
