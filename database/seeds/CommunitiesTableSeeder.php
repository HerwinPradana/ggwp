<?php

use Illuminate\Database\Seeder;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('communities')->truncate();
		$community1 = Community::create([
			'content'		=> 'Get Good Dev Team',
			'description'	=> 'Dummy community.',
			'image'			=> 'ic_launcher.png',
			'created_by'	=> 1,
			'updated_by'	=> 1
		]);
    }
}
