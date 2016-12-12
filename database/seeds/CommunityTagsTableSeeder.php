<?php

use Illuminate\Database\Seeder;

class CommunityTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('community_tags')->truncate();
		DB::table('community_tags')->insert([
            ['community_id'	=> 1, 'tag_id'	=> 1],
            ['community_id'	=> 1, 'tag_id'	=> 2],
        ]);
    }
}
