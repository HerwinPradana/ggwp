<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommunityPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('community_posts')->truncate();
		DB::table('community_posts')->insert([
            ['community_id'	=> 1, 'post_id' => 1],
            ['community_id'	=> 2, 'post_id' => 1],
            ['community_id'	=> 5, 'post_id' => 4],
            ['community_id'	=> 6, 'post_id' => 5],
        ]);
    }
}
