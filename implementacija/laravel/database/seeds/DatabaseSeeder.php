<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	// sredjuje sve php artisan migrate:refresh --seed
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
        $this->call(ChampionTableSeeder::class);
        
               
    }
}
