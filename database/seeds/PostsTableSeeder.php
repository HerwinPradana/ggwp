<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('posts')->truncate();
		$post1 = Post::create([
			'content'		=> 'You can just post these to test stuff.',
			'created_by'	=> 1,
			'updated_by'	=> 1
		]);
		
		$post2 = Post::create([
			'content'		=> 'Fighting the Mountain. Totally gonna win, you guys.',
			'created_by'	=> 5,
			'updated_by'	=> 5
		]);
    }
}
