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
    	DB::table('users')->truncate();
		$user1 = User::create([
			'name' 		=> 'Herwin Pradana',
			'email' 	=>'herwinpradana@gmail.com',
			'password' 	=> bcrypt('testing'),
			'image' 	=> 'chisama.png'
		]);
		$user2 = User::create([
			'name' 		=> 'Latif Sulistyo',
			'email'		=>'latifsulistyo.me@gmail.com',
			'password'	=> bcrypt('testing'),
			'image' 	=> 'tempest.jpg'
		]);
		$user3 = User::create([
			'name'		=> 'Dimas Yanu R.',
			'email'		=>'dimasyanu@gmail.com',
			'password'	=> bcrypt('testing'),
			'image' 	=> 'yanoo_.jpg'
		]);
		$user4 = User::create([
			'name'		=> 'Lord Popo',
			'email'		=>'popo@kamihouse.com',
			'password'	=> bcrypt('testing'),
			'image' 	=> 'popo.png'
		]);
		$user5 = User::create([
			'name'		=> 'Oberyn Martell',
			'email'		=>'redviper@dorne.com',
			'password'	=> bcrypt('testing'),
			'image' 	=> 'oberyn-martell.jpg'
		]);
    }
}
