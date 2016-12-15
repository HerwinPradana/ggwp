<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tags')->truncate();
		$tag1 = Tag::create([
			'name' 				=> 'Tutorial',
			'description' 		=> 'Everything instructional.',
			'background_color' 	=> '#c200c9',
			'text_color'		=> null,
			'created_by' 		=> 1,
			'updated_by' 		=> 1
		]);
		
		$tag2 = Tag::create([
			'name' 				=> 'Programming',
			'description' 		=> 'Making software by coding.',
			'background_color' 	=> '#3c3b37',
			'text_color'		=> null,
			'created_by' 		=> 1,
			'updated_by' 		=> 1
		]);
		
		$tag3 = Tag::create([
			'name' 				=> 'Mobile Dev',
			'description' 		=> 'Everything related to mobile apps development.',
			'background_color' 	=> '#7fb348',
			'text_color'		=> null,
			'created_by' 		=> 1,
			'updated_by' 		=> 1
		]);
		
		$tag4 = Tag::create([
			'name' 				=> 'HEMA',
			'description' 		=> 'Historical European Martial Art.',
			'background_color' 	=> null,
			'text_color'		=> null,
			'created_by' 		=> 5,
			'updated_by' 		=> 5
		]);
		
		$tag5 = Tag::create([
			'name' 				=> 'Dragonball Training',
			'description' 		=> 'Training programme for non-Saiyans.',
			'background_color' 	=> '#f8a333',
			'text_color'		=> null,
			'created_by' 		=> 4,
			'updated_by' 		=> 4
		]);
    }
}
