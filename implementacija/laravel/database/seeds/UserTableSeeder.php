<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder{
	public function run (){

		 DB::table('user')->insert([
		 	'username'=> 'jana',
		 	'password'=> bcrypt('drazenjekreten'),
		 	'online' => 1,
		 	'isAdmin'=> 0,
		 	'isMod'=> 0,
		 	'lolNick'=> 'fjara',
		 	'rank_id'=> 1,
		 ]);
	}
}