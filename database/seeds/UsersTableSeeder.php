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
        $user1 = new User([
			'name' 		=> 'Herwin Pradana',
			'email' 	=>'herwinpradana@gmail.com',
			'password' 	=> 'testing',
			'image' 	=> 'chisama.png'
		]);
		$user1->save();
		
		$user2 = new User([
			'name' 		=> 'Latif Sulistyo',
			'email'		=>'latifsulistyo.me@gmail.com',
			'password'	=> 'testing',
			'image' 	=> 'tempest.jpg'
		]);
		$user2->save();
		
		$user3 = new User([
			'name'		=> 'Dimas Yanu R.',
			'email'		=>'dimasyanu@gmail.com',
			'password'	=> 'testing',
			'image' 	=> 'yanoo_.jpg'
		]);
		$user3->save();
		
		$user4 = new User([
			'name'		=> 'Lord Popo',
			'email'		=>'popo@kamihouse.com',
			'password'	=> 'testing',
			'image' 	=> 'popo.png'
		]);
		$user4->save();
		
		$user5 = User::create([
			'name'		=> 'Oberyn Martell',
			'email'		=>'redviper@dorne.com',
			'password'	=> 'testing',
			'image' 	=> 'oberyn-martell.jpg'
		]);
		$user5->save();
    }
}
