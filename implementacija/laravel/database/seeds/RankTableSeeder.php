<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * RankTableSeeder - klasa za ubacivanje podataka u tabelu rank u bazi
 *
 * @version 1.0
 */
class RankTableSeeder extends Seeder{

	/**
	 * Run the seed.
	 *
	 * @return void
	 */
	public function run (){

		 DB::table('rank')->insert([
		 	'name'=>'BRONZE I',

		 ]);
		  DB::table('rank')->insert([
		 	'name'=>'BRONZE II',

		 ]);
		   DB::table('rank')->insert([
		 	'name'=>'BRONZE III',

		 ]);
		    DB::table('rank')->insert([
		 	'name'=>'BRONZE IV',

		 ]);
		     DB::table('rank')->insert([
		 	'name'=>'BRONZE V',

		 ]);
		 DB::table('rank')->insert([
		 	'name'=>'SILVER I',

		 ]);
		  DB::table('rank')->insert([
		 	'name'=>'SILVER II',

		 ]);
		   DB::table('rank')->insert([
		 	'name'=>'SILVER III',

		 ]);
		    DB::table('rank')->insert([
		 	'name'=>'SILVER IV',

		 ]);
		     DB::table('rank')->insert([
		 	'name'=>'SILVER V',

		 ]);
		  DB::table('rank')->insert([
		 	'name'=>'GOLD I',

		 ]);
		    DB::table('rank')->insert([
		 	'name'=>'GOLD II',

		 ]);
		      DB::table('rank')->insert([
		 	'name'=>'GOLD III',

		 ]);
		        DB::table('rank')->insert([
		 	'name'=>'GOLD IV',

		 ]);
		          DB::table('rank')->insert([
		 	'name'=>'GOLD V',

		 ]);
		            DB::table('rank')->insert([
		 	'name'=>'PLATINUM I',

		 ]);
		             DB::table('rank')->insert([
		 	'name'=>'PLATINUM II',

		 ]);
		              DB::table('rank')->insert([
		 	'name'=>'PLATINUM III',

		 ]);
		               DB::table('rank')->insert([
		 	'name'=>'PLATINUM IV',

		 ]);
		                DB::table('rank')->insert([
		 	'name'=>'PLATINUM V',

		 ]);
		                 DB::table('rank')->insert([
		 	'name'=>'DIAMOND I',

		 ]);
		                  DB::table('rank')->insert([
		 	'name'=>'DIAMOND II',

		 ]);                DB::table('rank')->insert([
		 	'name'=>'DIAMOND III',

		 ]);                DB::table('rank')->insert([
		 	'name'=>'DIAMOND IV',

		 ]);                DB::table('rank')->insert([
		 	'name'=>'DIAMOND V',

		 ]);  
		                 DB::table('rank')->insert([
		 	'name'=>'MASTER I',

		 ]);    
		                 DB::table('rank')->insert([
		 	'name'=>'CHALLENGER I',

		 ]);         


		

	}
}