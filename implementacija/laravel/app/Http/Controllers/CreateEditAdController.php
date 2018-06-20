<?php

/* Jana Kragovic 0023/2015*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Champion;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mastery;
use App\Mode;
use App\Position;
use App\Ad;
use Illuminate\Support\Facades\Auth;
class CreateEditAdController extends Controller
{
      /**
    * Funkcija za prikaz forme za kreiranje i izmenu oglasa
    *
    * @param Request $request
    *
    * @return response 
    */
    public function showFormAd(Request $request){

  $id=$request->ad;
         $broj=0;
        $oglasi=Ad::where('user_id',Auth::user()->id)->get();
        foreach($oglasi as $o){
            $broj++;
        }
        if($broj==3 &&$id==null){
            return redirect('users')->with("previseOglasa",'Ne mozete kreirati vise od tri oglasa!');
        }

      
        $ad=null;
        $position=null;
        $mode=null;

        if($id!=null){
            $ad=Ad::where('id',$id)->first();
            $position=Position::where('id',$ad->position_id)->first()->name;
            $mode=Mode::where('id',$ad->mode_id)->first()->name;
        }
        
        
        $champions = Champion::all();

        return view('profile/forms/createEditAdForm')->with('champions', $champions)->with('ad',$ad)->with('position',$position)->with('mode',$mode)->with('id',$id);
    }

      /**
    * Funkcija za kreiranje i edit oglasa
    *
    * @param Request $request
    *
    * @return response 
    */
    public function createAd(Request $request){
    	
    	$this->validate($request,[
            'opis' =>'required'	
          
        ]);


       
        
        $opis=$request->opis;
        $mod=$request->mod;
        $mod_id=Mode::where('name',$mod)->first()->id;
        

        $pozicija=$request->pozicija;
        $pozicija_id=Position::where('name',$pozicija)->first()->id;


        $champs= $request->input('slike');
        if($champs==null){
            return redirect()->back()->with("nemaHeroja",'Morate selektovati barem jednog heroja!');
        }
        
        $cnt=0;
        foreach($champs as$champ){
            $cnt++;
        }

        if($cnt>3){
             return redirect()->back()->with("previseHeroja",'Možete najviše selektovati tri heroja!');
        }
        $user_id=Auth::user()->id;
        $api_key='RGAPI-3295c182-2564-4de1-9e7e-53f0ddb04a13';
      

        $filename='https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.Auth::user()->lolNick.'?api_key='.$api_key;
        $result= file_get_contents($filename);
        $sum=json_decode($result);


    
        $summoner_id=$sum->id;
        
        
        $ch1=$champs[0];
        
        $champ1=Champion::where('name',$ch1)->first();

        $filename='https://eun1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summoner_id.'/by-champion/'.$champ1->champion_id.'?api_key='.$api_key;



       if($this->get_http_response_code($filename) == 404 ){
            return redirect()->back()->with("nemasHeroja","Selektovali ste heroja kojeg ne igrate!");

       }

        $result= file_get_contents($filename);
        $mastery1=json_decode($result);

        $m1=new Mastery();
        $m1->level=$mastery1->championLevel;
        $m1->points=$mastery1->championPoints;
        $m1->user_id=$user_id;
        $m1->champion_id=$champ1->id;
        $m1->save();
        

        $idAd=$request->idAd;
        if($idAd!=null){
            Ad::where('id',$idAd)->delete();
        }       


        $ad=new Ad();
        $ad->description=$opis;
        $ad->user_id=$user_id;
        $ad->mode_id=$mod_id;
        $ad->position_id=$pozicija_id;
        $ad->mastery1_id=$m1->id;

        //ako je selektovao drugog champa

        if($cnt>1){
            $ch1=$champs[1];
            
            $champ1=Champion::where('name',$ch1)->first();

            $filename='https://eun1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summoner_id.'/by-champion/'.$champ1->champion_id.'?api_key='.$api_key;



           if($this->get_http_response_code($filename) == 404 ){
                return redirect()->back()->with("nemasHeroja","Selektovali ste heroja kojeg ne igrate!");

           }

            $result= file_get_contents($filename);
            $mastery1=json_decode($result);

            $m1=new Mastery();
            $m1->level=$mastery1->championLevel;
            $m1->points=$mastery1->championPoints;
            $m1->user_id=$user_id;
            $m1->champion_id=$champ1->id;
            $m1->save();
             $ad->mastery2_id=$m1->id;
         
        }

        if($cnt>2){
            $ch1=$champs[2];
            
            $champ1=Champion::where('name',$ch1)->first();

            $filename='https://eun1.api.riotgames.com/lol/champion-mastery/v3/champion-masteries/by-summoner/'.$summoner_id.'/by-champion/'.$champ1->champion_id.'?api_key='.$api_key;



           if($this->get_http_response_code($filename) == 404 ){
                return redirect()->back()->with("nemasHeroja","Selektovali ste heroja kojeg ne igrate!");

           }

            $result= file_get_contents($filename);
            $mastery1=json_decode($result);

            $m1=new Mastery();
            $m1->level=$mastery1->championLevel;
            $m1->points=$mastery1->championPoints;
            $m1->user_id=$user_id;
            $m1->champion_id=$champ1->id;
            $m1->save();
             $ad->mastery3_id=$m1->id;
       
        }

        $ad->save();

        return redirect('users');

    }

      /**
    * Funkcija za response koda
    *
    * @param Request $url
    *
    * @return response 
    */
    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}
