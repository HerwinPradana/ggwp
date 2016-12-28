<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\User;
use App\Community;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommunityController extends Controller{

    use Helpers;

    private function currentUser(){
        return JWTAuth::parseToken()->authenticate();
    }

    public function get(Request $request){
        $this->currentUser();
        
        $query = Community::with('tags');
        
        $user_id = $request->get('user_id');
        if($user_id){
        	$query->whereHas('members', function($query) use ($user_id){
				$query->where('users.id', $user_id);
			});
		}
        
	    $response = new \stdClass();
	    $response->result = $query->orderBy('created_at', 'desc')->get();

	    return response()->json($response);
    }

    public function detail(Request $request){
        $this->currentUser();
        
        $id = $request->get('id');
        
	    $response = new \stdClass();
	    $response->result = Community::find($id);

	    return response()->json($response);
    }

    public function members(Request $request){
        $this->currentUser();
        
        $community_id = $request->get('community_id');
        
	    $response = new \stdClass();
	    $response->result = User::whereHas('communities', function($query) use ($community_id){
			$query->where('community_id', $community_id);
		})->orderBy('created_at', 'desc')->get();

	    return response()->json($response);
    }

    public function store(Request $request)
    {   
        $this->currentUser();
        
        $post = new Post;
        $post->content = $request->get('content');
        $post->is_tutorial = $request->get('is_tutorial');
        $post->created_by = $this->currentUser()->id;
        $post->updated_by = $this->currentUser()->id;

        if($this->currentUser()->posts()->save($post))
            return $this->response->created();
        else
            return $this->response->error('could_not_create_book', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->currentUser()->posts()->find($id);
        if(!$post)
            throw new NotFoundHttpException; 
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->currentUser()->posts()->find($id);
        if(!$post)
            throw new NotFoundHttpException;

        $post->update($request->all());
        $post->updated_by = $this->currentUser()->id;
        
        if($post->save())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_update_post', 500);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->currentUser()->posts()->find($id);
        if(!$post)
            throw new NotFoundHttpException;
        if($post->delete())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_delete_book', 500);
    }
}
