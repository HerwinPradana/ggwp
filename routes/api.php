<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);

        //
        $api->get('checkToken', 'App\Api\V1\Controllers\TokenController@checkToken');
        $api->resource('tags', 'App\Api\V1\Controllers\TagController');

        $api->group(['prefix' => 'user'], function(Router $api) {
        	$api->post('profile', 'App\Api\V1\Controllers\UserController@profile');
        });
        
        $api->group(['prefix' => 'post'], function(Router $api) {
        	$api->post('get', 'App\Api\V1\Controllers\PostController@get');
        	$api->post('store', 'App\Api\V1\Controllers\PostController@store');
        });
        
        $api->group(['prefix' => 'community'], function(Router $api) {
        	$api->post('get', 'App\Api\V1\Controllers\CommunityController@get');
        	$api->post('detail', 'App\Api\V1\Controllers\CommunityController@detail');
        	$api->post('members', 'App\Api\V1\Controllers\CommunityController@members');
        });
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });
});
