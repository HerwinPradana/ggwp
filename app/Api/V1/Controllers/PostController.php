<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\User;
use App\Post;
use App\Tag;
use App\Community;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller{

    use Helpers;

    private function currentUser(){
        return JWTAuth::parseToken()->authenticate();
    }

    public function get(Request $request){
        $this->currentUser();
        
        $user_id	  = $request->get('user_id');
        $community_id = $request->get('community_id');
        $type		  = $request->get('type');

    	$query = Post::with('user', 'images', 'communities', 'tags');
        
        if($type){
	        $interests = User::find($this->currentUser()->id)->tags;
	        
			if($interests->count() > 0){
				$tags = array();
				foreach($interests as $tag){
					$tags[] = $tag->id;
				}
				
				if($type == 'interest'){
					$query->whereHas('tags', function($query) use ($tags){
						$query->whereIn('tag_id', $tags);
					});
				}
				else{
					$query->whereDoesntHave('tags', function($query) use ($tags){
						$query->whereIn('tag_id', $tags);
					});
				}
			}
        }
        else{
        	if($user_id)
        		$query->where('created_by', $user_id);
        	
        	if($community_id){
				$query->whereHas('communities', function($query) use ($community_id){
					$query->where('community_id', $community_id);
				});
    		}
    		
        }

		$response = new \stdClass();
		$response->result = $query->orderBy('created_at', 'desc')->get();

	    return response()->json($response);
    }

    public function store(Request $request){
        $this->currentUser();
        
        $tags		 = $request->get('tags');
        $communities = $request->get('communities');
        
        $post = new Post;
        $post->content = $request->get('content');
        $post->created_by = $this->currentUser()->id;
        $post->updated_by = $this->currentUser()->id;
        
        $status = $this->currentUser()->posts()->save($post);

        if($status){
			$tags 	  	 = ($tags)? json_decode($tags) : null;
			$communities = ($communities)? json_decode($communities) : null;
						
			$post->tags()->attach($tags);
			$post->communities()->attach($communities);
        }
			
		$response = new \stdClass();
		$response->status = ($status != null);
		
        return response()->json($response);
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
