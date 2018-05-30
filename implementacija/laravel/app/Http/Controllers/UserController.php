<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Validator;
use Illuminate\Support\Facades\Auth;

use App\Rank;


use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserController extends Controller
{
    public function index(){
    
    	return view('profile.profileUser');
    }
    
    public function editDescription(Request $request){

    	//validacija
        $descr=$request->input('opis');
      //  $user = User::where('Username', 'jana')->update(['Description'=>$descr]);
    }
    
    public function changePassword(Request $request){
        $stara=$request->input('staraLozinka');
        $nova=$request->input('novaLozinka');
        $ponovi=$request->input('ponoviLozinku');
       // $user = User::where('Username', 'jana')->update(['Password'=>$nova]);
    }	

    public function home(){
        return view('guestLobby');
    }

     public function registerUser(Request $request){

        $this->validate($request,[
            'username' => 'required|unique:user,Username',
            'pass' => 'required',
            'passConfirm' => 'required',
            'lolUsername' => 'required|unique:user,LoLNick',
        ]);

        $user = new User();
        
        $user->username = $request->input("username");
        $user->password = bcrypt($request->input("pass"));
        $user->online = 1;
        $user->isAdmin = 0;
        $user->isMod=0;
        $user->lolNick = $request->input("lolUsername");
        $user->level = 1; //sredi
        $user->rank_id=1;//sredi

        $api_key='RGAPI-3295c182-2564-4de1-9e7e-53f0ddb04a13';
        $summonerName=$request->input("lolUsername");
        $filename='https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName.'?api_key='.$api_key;

        $result= file_get_contents($filename);
        $summoner=json_decode($result);
        /*------------------------slika------------------------------*/
        $url_icon="http://avatar.leagueoflegends.com/eun1/".$summonerName.".png";
        $img_id=$summoner->profileIconId;

        $img='slike/icons/'.$img_id.".png";
        file_put_contents($img, file_get_contents($url_icon));

        $user->icon=$img;
        /*------------------------slika------------------------------*/


        /*-------------------------rank-------------------*/

        $summonerId=$summoner->id;

         $filename='https://eun1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$summonerId.'?api_key='.$api_key;

        $result= file_get_contents($filename);
        $rankInfo=json_decode($result);
       
        $rank=$rankInfo[0]->tier." ".$rankInfo[0]->rank;
        //proveri za koji mod igre vrca rank na poziciji 0 , da li je uvek ranked solo duo na 0
        $rankTable= Rank::where('name',$rank)->first();
        $user->rank_id=$rankTable->id;





        $user->save();

        $credentials = ['username' => $request->input("username"), 'password' => $request->input("pass")];

        if (Auth::attempt($credentials)) {
          return "jeej";
        }
        else{
            return "cao";
        }
        
    }

}
