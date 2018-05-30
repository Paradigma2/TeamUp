<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModeTableSeeder extends Seeder{
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