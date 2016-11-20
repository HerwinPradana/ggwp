<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user1 = User::create(['name'=>'Latif Sulistyo', 'email'=>'latifsulistyo.me@gmail.com', 'password'=> bcrypt('testing')]);
		$user2 = User::create(['name'=>'Dimas Yanu R.', 'email'=>'dimasyanu@gmail.com', 'password'=> bcrypt('testing')]);
		$user3 = User::create(['name'=>'Herwin Pradana', 'email'=>'herwinpradana@gmail.com', 'password'=> bcrypt('testing')]);
    }
}
