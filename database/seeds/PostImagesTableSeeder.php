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
            ['post_id' => 2, 'file' => 'fight.png']
        ]);
    }
}
