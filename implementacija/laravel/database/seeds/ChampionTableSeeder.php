<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * ChampionTableSeeder - klasa za ubacivanje podataka u tabelu champion u bazi
 *
 * @version 1.0
 */
class ChampionTableSeeder extends Seeder{

	/**
     * Run the seed.
     *
     * @return void
     */
	public function run (){

		$api_key='RGAPI-3295c182-2564-4de1-9e7e-53f0ddb04a13';
		$filename = 'https://eun1.api.riotgames.com/lol/static-data/v3/champions?locale=en_US&champListData=image&dataById=false&api_key='.$api_key;
		$result= file_get_contents($filename);
		$champions = json_decode($result)->data;

		foreach ($champions as $champ) {
			DB::table('champion')->insert([
		 	'name'=>$champ->key,
		 	'icon'=>'slike/'.$champ->key.'.png',
		 	'champion_id'=>$champ->id,
		 ]);
			
		}


		 
		 
	}
}