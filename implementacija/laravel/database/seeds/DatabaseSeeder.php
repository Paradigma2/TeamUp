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
        $this->call(ModeTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(ChampionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);

    }
}
