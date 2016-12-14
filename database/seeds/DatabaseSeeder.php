<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(CommunitiesTableSeeder::class);
        $this->call(PostImagesTableSeeder::class);
        $this->call(CommunityTagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostTagsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
