<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostCommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('post_communities')->truncate();
		DB::table('post_communities')->insert([
            ['post_id' 	=> 1, 'community_id'	=> 1],
            ['post_id' 	=> 1, 'community_id'	=> 2],
            ['post_id' 	=> 4, 'community_id'	=> 4],
            ['post_id' 	=> 5, 'community_id'	=> 5],
        ]);
    }
}
