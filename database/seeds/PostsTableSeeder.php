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
			'content'		=> 'Hidup bukanlah tentang bagaimana menemukan diri, tetapi bagaimana menciptakan diri yang sebenarnya.',
			'created_by'	=> 2,
			'updated_by'	=> 2
		]);

		$post3 = Post::create([
			'content'		=> 'Hidup itu sederhana, maka janganlah membuatnya sulit.',
			'created_by'	=> 3,
			'updated_by'	=> 3
		]);

		$post4 = Post::create([
			'content'		=> 'Sukses bukanlah milik mereka yang pintar dan cerdas. Sukses adalah milik mereka yang memiliki mimpi dan berjuang mati-matian untuk menggapai mimpi itu.',
			'created_by'	=> 4,
			'updated_by'	=> 4
		]);

		$post5 = Post::create([
			'content'		=> 'Fighting the Mountain. Totally gonna win, you guys.',
			'created_by'	=> 5,
			'updated_by'	=> 5
		]);

		$post6 = Post::create([
			'content'		=> 'Menyesal sama seperti mengejar bayangan kita sendiri. Semakin dikejar, semakin jauh dari jangkauan kita.',
			'created_by'	=> 6,
			'updated_by'	=> 6
		]);
    }
}
