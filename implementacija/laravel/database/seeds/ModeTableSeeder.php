<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * ModeTableSeeder - klasa za ubacivanje podataka u tabelu mode u bazi
 *
 * @version 1.0
 */
class ModeTableSeeder extends Seeder{

	/**
	 * Run the seed.
	 *
	 * @return void
	 */
	public function run (){

		 DB::table('mode')->insert([
		 	'name'=>'Summoners Rift',

		 ]);
		  DB::table('mode')->insert([
		 	'name'=>'Twistet Treeline',

		 ]);
		   DB::table('mode')->insert([
		 	'name'=>'Aram',

		 ]);
		    DB::table('mode')->insert([
		 	'name'=>'Featured',

		 ]);
		     DB::table('mode')->insert([
		 	'name'=>'Custom Game',

		 ]);
	}
}