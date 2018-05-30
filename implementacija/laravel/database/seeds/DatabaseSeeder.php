<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
        $this->call(ModeTableSeeder::class);
         $this->call(RankTableSeeder::class);
     		$this->call(PositionTableSeeder::class);
               
    }
}
