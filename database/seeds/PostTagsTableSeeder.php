<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('post_tags')->truncate();
		DB::table('post_tags')->insert([
            ['post_id' 	=> 1, 'tag_id'	=> 1],
            ['post_id' 	=> 1, 'tag_id'	=> 2],
            ['post_id' 	=> 1, 'tag_id'	=> 3],
            ['post_id' 	=> 2, 'tag_id'	=> 4]
        ]);
    }
}
