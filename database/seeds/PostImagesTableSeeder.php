<?php

use Illuminate\Database\Seeder;

class PostImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('post_images')->truncate();
		DB::table('post_images')->insert([
            ['post_id' => 1, 'file' => 'random.png'],
            ['post_id' => 1, 'file' => 'commiedl.png'],
            ['post_id' => 2, 'file' => 'fight.png'],
            ['post_id' => 3, 'file' => 'renpy_feature.jpg'],
            ['post_id' => 4, 'file' => 'bws_unity_3d_2.png'],
            ['post_id' => 5, 'file' => 'random.png'],
            ['post_id' => 6, 'file' => 'fencing_tutorial.jpg'],
            ['post_id' => 6, 'file' => 'fencing2.jpg']
        ]);
    }
}
