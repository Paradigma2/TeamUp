<?php
/* autor: Sanja Perisic, 97/2015 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * ArticleTableSeeder - klasa za ubacivanje podataka u tabelu article u bazi
 *
 * @version 1.0
 */
class ArticleTableSeeder extends Seeder{
    /**
     * Run the seed.
     *
     * @return void
     */
	public function run (){
        DB::table('article')->insert([
		 	'headline'=> 'Vip napravio karticu za igrače LoL-a',
		 	'content'=> 'Vip je jedini od tri mobilna operatara u našoj zemlji koji posvećuje posebnu pažnju gejming zajednici. Predstavili su posebnu ponudu u okviru njihove delatnosti  u vidu kartica za gejmere za akcentom na benefite u vidu bonus RP-a za League of Legends.
            Danas je aktuelna ponuda Vip Gaming prepaidcard. Dakle u pitanju je prepaid kartica na koju uplaćujete kredit. Karticu je moguće kupiti u svim Vip centrima.
            Kartica košta 500 dinara i kada je kupite dobijate dakle 500 dinara kredita i pored toga još 4 gigabajta interneta koji možete da iskoristite u roku od 7 dana kao i 350 RP-a. RP iz ove ponude važi samo za Europe Nordic and East server.
            Ono što ovu ponudu čini još boljom jeste činjenica da kasnije kada već imate karticu svaki put kada uplatite 500 dinara ili više dobijate ponovo bonus od 350 RP-a.Ukoliko svi ovi Riot poeni iz bonusa nisu dovoljni i želite još više ove gejming valute možeš kupiti  preko Vipa i ova opcija je dostupna i drugim postpaid i prepaid Vip korisnicima. Cene su i ovde fantastične pa tako možete dobiti 350 RP-a za 350 dinara ili veći paket od 750 RP-a za 750 dinara.Kupovina je vrlo jednostavna i možete je obaviti preko svog mobilnog telefona bilo kada.',
		 	'user_id' => 2,
		 	'created_at'=> Carbon::today()->toDateTimeString(),
            'updated_at' => Carbon::today()->toDateTimeString(),
		 ]);
          DB::table('article')->insert([
            'headline'=> 'LoL Serbia powered by Asus zavrsni turnir',
            'content'=> 'Zavrsni turnir pocinje u nedelju 8. oktobra 2017. godine tacno u podne tj u 12:00. Postoje male promene pravila posto se ne igra na Battlefy sajtu, procitajte ispod bracketa obavezno. Kako je mali broj igraca, mozete slobodno za sva pitanja nedoumice i sve sto vas zanima da pisete u inbox stranice, odgovaracu vam veoma brzo.
            Pravila vaze ista kao i na svim dosadasnjim turnirima.Jedina razlika je sto se sada ne igra preko battlefy sajta pa nema tournament kodova vec rucno zovete protivnika u gejm. Napravite custom i zovite ga (moguce je da zovete protivnika i ako ga nemate u prijateljima, ako treba pomoc javite se u inbox). Od momenta kada dobijete protivnika imate 5 minuta da pocnete mec, ukoliko se vas protivnik ne pojavljuje napravite screenshot kada ste usli u custom i pozvali ga i uhvatite i sat na racunaru da se vidi i kada prodje pet minuta napravite jos jedan takav screenshot i posaljite u inbox facebook stranice
            Posto se ne igra na battlefy sajtu morate vi sami da prijavite rezultate gejmova, dakle morate napraviti screenshot pobede i da posaljete u inbox stranice.
           ',
            'user_id' => 2,
            'created_at'=> Carbon::today()->toDateTimeString(),
            'updated_at' => Carbon::today()->toDateTimeString(),
         ]);
           DB::table('article')->insert([
            'headline'=>'Svetski turnir zavrsen',
            'content'=> 'Pobednici, tim Kliktech osvojili su nagradu od 5.000 evra, a drugoplasirani Bontech 3.000 evra. U borbi za treće mesto, tim x25 Esports je rezultatom 2 :1 pobedio tim RUR Esports i osvojio 1.500 evra dok je poraženi osvojio iznos od 500 evra.
            Osim finansijske nagrade i prestiža, Kliktech  kao pobednik Vip Adria League powered by ESL iduće godine dobija direktnu pozivnicu za grupnu fazu takmičenju u ESL Southeast Europe Championshipu.
            Komentar nakon pobede dao je Toni „Sacre“ Sabalić iz pobedničkog tima Klicktech, ujedno i MVP finalnog turnira: Kroz celo takmičenje smo bili na visokom nivou i završili smo ligu bez poraza. Puno mi znači osvajanje MVP nagrade jer sam u svom Zagrebu pokazao šta mogu. Veselimo se idućem izdanju Vip Adria Lige koja je organizovana bolje nego bilo koje drugo takmičenje do sada i drago mi je što i u Hrvatskoj možemo da vidimo ozbiljnu profesionalizaciju esports scene.
           ',
            'user_id' => 2,
            'created_at'=> Carbon::today()->toDateTimeString(),
            'updated_at' => Carbon::today()->toDateTimeString(),
         ]);
	}
}