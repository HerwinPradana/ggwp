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
			'description'	=> 'Dev Dummy community.',
			'image'			=> 'ic_launcher.png',
			'created_by'	=> 1,
			'updated_by'	=> 1
		]);
        $community2 = Community::create([
            'name'          => 'Get Good UI Designer Team',
            'description'   => 'Dummy community.',
            'image'         => 'ui_dev.png',
            'created_by'    => 1,
            'updated_by'    => 1
        ]);
        $community3 = Community::create([
            'name'          => 'Fun Historical European Martial Arts Club',
            'description'   => 'Having fun learning stuff.',
            'image'         => 'fun_hema.jpg',
            'created_by'    => 5,
            'updated_by'    => 5
        ]);
        $community4 = Community::create([
            'name'          => 'Z-Figthers',
            'description'   => 'Gym ala Dragonball.',
            'image'         => 'dragonball.png',
            'created_by'    => 5,
            'updated_by'    => 5
        ]);
    }
}
