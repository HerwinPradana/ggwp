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
		
		$post3 = Post::create([
			'content'		=> 'Habis nyobain RenPy. Game engine untuk buat Visual Novel dan scriptingnya pakai Python, jadi enak banget.',
			'created_by'	=> 2,
			'updated_by'	=> 2
		]);

		$post4 = Post::create([
			'content'		=> 'Unity3D versi Mac udah keluar. Masih beta, tapi sejauh ini ga ada bug.',
			'created_by'	=> 3,
			'updated_by'	=> 3
		]);

		$post5 = Post::create([
			'content'		=> 'Got some new kids today. They seemed to have fun in that trainng room.',
			'created_by'	=> 4,
			'updated_by'	=> 4
		]);

		$post6 = Post::create([
			'content'		=> 'Today I\'m gonna teach you folks how to parry and riposte effectively with a longsword.',
			'created_by'	=> 5,
			'updated_by'	=> 5
		]);
    }
}
