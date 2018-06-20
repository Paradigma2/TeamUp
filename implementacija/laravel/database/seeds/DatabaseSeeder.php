<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder - klasa za ubacivanje podataka u tabelu champion u bazi
 *
 * @version 1.0
 */
class DatabaseSeeder extends Seeder
{
    //php artisan migrate:refresh --seeds
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
