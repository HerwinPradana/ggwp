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
		$tag1 = Tag::create(['name'=>'Robot', 'color'=>'#ee72ff', 'created_by'=>1, 'updated_by'=>1]);
		$tag2 = Tag::create(['name'=>'Masakan', 'color'=>'#25ede9', 'created_by'=>1, 'updated_by'=>1]);
		$tag3 = Tag::create(['name'=>'Catur', 'color'=>'#ff4747', 'created_by'=>1, 'updated_by'=>1]);
    }
}
