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
            ['post_id' => 3, 'file' => 'keep_calm.jpg'],
            ['post_id' => 4, 'file' => 'do_what_you_love.jpg'],
            ['post_id' => 5, 'file' => 'organic_shop.jpg'],
            ['post_id' => 6, 'file' => 'mars_explorer.jpg']
        ]);
    }
}
