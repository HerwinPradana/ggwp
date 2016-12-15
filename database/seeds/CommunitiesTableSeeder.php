<?php

use Illuminate\Database\Seeder;
use App\Community;

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
            'name'          => 'Get Good Dev Team',
			'content'		=> 'Get Good Dev Team',
			'description'	=> 'Dev Dummy community.',
			'image'			=> 'ic_launcher.png',
			'created_by'	=> 1,
			'updated_by'	=> 1
		]);
        $community1 = Community::create([
            'name'          => 'Get Good Testing Team',
            'content'       => 'Get Good Testing Team',
            'description'   => 'Dummy community.',
            'image'         => 'tester.png',
            'created_by'    => 1,
            'updated_by'    => 1
        ]);
        $community1 = Community::create([
            'name'          => 'Get Good UV Designer Team',
            'content'       => 'Get Good UV Designer Team',
            'description'   => 'Dummy community.',
            'image'         => 'ui_dev.png',
            'created_by'    => 1,
            'updated_by'    => 1
        ]);
    }
}
