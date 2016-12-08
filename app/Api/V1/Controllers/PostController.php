<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\User;
use App\Post;
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
    
    public function discovery(Request $request){
        $this->currentUser();
        
        $interests = User::find($request->get('id'))->tags;
	    $response  = new \stdClass();

		if($interests->count() > 0){
		    $tags = array();
		    foreach($interests as $tag){
		    	$tags[] = $tag->id;
		    }

		    $response->result = Post::with('user', 'tags')
									->join('post_tags AS b', 'posts.id', '=', 'b.post_id')
									->whereNotIn('b.tag_id', $tags)
									->orderBy('created_at', 'desc')
									->get();
	    }
	    else{
		    $response->result = Post::with('user', 'tags')->orderBy('created_at', 'desc')->get();
	    }
	    
	    return response()->json($response);
    }

    public function interests(Request $request){
        $this->currentUser();
        
        $interests = User::find($request->get('id'))->tags;
	    $response  = new \stdClass();
		
		if($interests->count() > 0){
		    $tags = array();
		    foreach($interests as $tag){
		    	$tags[] = $tag->id;
		    }
		    
		    $response->result = Post::with('user', 'tags')
		    						->join('post_tags AS b', 'posts.id', '=', 'b.post_id')
		    						->whereIn('b.tag_id', $tags)
		    						->orderBy('created_at', 'desc')
		    						->get();
	    }
	    else{
		    $response->result = Post::with('user', 'tags')->orderBy('created_at', 'desc')->get();
		}

	    return response()->json($response);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
