<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder{
	public function run (){


      

        $img='slike/icons/3398.png';
        
       

		 DB::table('user')->insert([
		 	'username'=> 'jana',
		 	'password'=> bcrypt('jana'),
		 	'online' => 0,
		 	'isAdmin'=> 1,
		 	'isMod'=> 0,
		 	'lolNick'=> 'fjara',
		 	'rank_id'=> 7,
		 	'icon' =>$img,
		 	'level' =>41,
		 ]);

	
       

        $img='slike/icons/774.png';
      
     

		 DB::table('user')->insert([
		 	'username'=> 'lemi',
		 	'password'=> bcrypt('lemi'),
		 	'online' => 0,
		 	'isAdmin'=> 0,
		 	'isMod'=> 1,
		 	'lolNick'=> 'darkknightkaca',
		 	'rank_id'=> 14,
		 	'icon' =>$img,
		 	'level' => 60,
		 ]);

	}
}