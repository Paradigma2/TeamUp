<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * UserTableSeeder - klasa za ubacivanje podataka u tabelu user u bazi
 *
 * @version 1.0
 */
class UserTableSeeder extends Seeder{

	/**
	 * Run the seed.
	 *
	 * @return void
	 */
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