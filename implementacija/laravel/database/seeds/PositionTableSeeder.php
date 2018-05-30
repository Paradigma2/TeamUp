<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PositionTableSeeder extends Seeder{
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