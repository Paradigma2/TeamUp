<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * PositionTableSeeder - klasa za ubacivanje podataka u tabelu position u bazi
 *
 * @version 1.0
 */
class PositionTableSeeder extends Seeder{

	/**
	 * Run the seed.
	 *
	 * @return void
	 */
	public function run (){

		 DB::table('position')->insert([
		 	'name'=>'ADC',

		 ]);
		 DB::table('position')->insert([
		 	'name'=>'Support',

		 ]);
		 DB::table('position')->insert([
		 	'name'=>'Top',

		 ]);
		 DB::table('position')->insert([
		 	'name'=>'Jungle',

		 ]);
		 DB::table('position')->insert([
		 	'name'=>'Mid',

		 ]);
	}
}