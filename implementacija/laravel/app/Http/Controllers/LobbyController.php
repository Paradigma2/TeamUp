<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Rank;
use App\Mode;
use App\Champion;
use App\Mastery;
use App\Comment;
use App\Block;
use App\Ban;
use App\Conversation;
use App\Message;



use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Ad;
use App\Position;


use App\Article;
use App\Follow;

/**
 * LobbyController - klasa za prikaz lobija i informacija u njemu, kao i pretragu korisnika
 *
 * @version 1.0
 */
class LobbyController extends Controller{

	
	/**
	 * Funkcija za dohvatanje response koda html stranice
	 *
	 * @param $url
	 *
	 * @return Response
	 */
	 function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    /**
     * Funkcija za prikaz lobija gostu
     *
     * @return Response
     */
	public function showGuestLobby(){
        $articles = Article::orderBy('updated_at', 'desc')->get();
        $users = [];
        foreach($articles as $article){
            $users[] = User::where('id', $article->user_id)->first();
        }
        $length = count($articles);
        return view('guestLobby')->with('articles', $articles)->with('length', $length)->with('users', $users);
    }

    /**
     * Funkcija za prikaz lobija ulogovanom korisniku
     *
     * @param Request $request
     *
     * @return Response
     */
    public function home(Request $request){
       
       $articles = Article::orderBy('updated_at', 'desc')->get();
       $authors = [];
        foreach($articles as $article){
            $authors[] = User::where('id', $article->user_id)->first();
        }
        $length = count($articles);
        $username = Auth::user()->username;
        //$myId = User::where('username', $username)->first()->id;
        $myId = Auth::user()->id;
        if(Auth::user()->isAdmin == 0){
            $followedUsers = Follow::where('user_id', $myId)->get();
            $followed = [];
            foreach($followedUsers as $f){
            $followed[] = User::where('id', $f->userFollowed_id)->first();
            }
        }
        $users=[];
        $p="";
        $blocked=[];

        if(isset($request->usernameSearch)){
            $p=$request->usernameSearch;
            $users = User::where('username', 'like', $request->usernameSearch."%")->get();
            $blockedUsers = Block::where('user_id', $myId)->get();
            foreach($users as $u){
                foreach($blockedUsers as $b){
                    if($u->id == $b->userBlocked_id){
                     $blocked[] = $u;
                        break;
                 }
                }
            }
           if(count($users)==0){
            $users[0]="Ne postoji korisnik";
           }
        }
        $theUser = Auth::user();
        if(Auth::user()->isAdmin){
            return view('adminLobby')->with('articles',$articles)->with('length', $length)->with('users', $users)->with('authors', $authors)->with('p',$p)->with('theUser', $theUser);
        }

      
        
        return view('userLobby')->with('articles', $articles)->with('length', $length)->with('followed', $followed)->with('users', $users)->with('authors', $authors)->with('p',$p)->with('theUser', $theUser)->with('blocked', $blocked);
    }

    /**
     * Funkcija za dohvatanja korisnickog imena kao parametra pretrage
     *
     * @param Request $request
     *
     * @return Response
     */
    public function searchUserByName(Request $request){
        $this->validate($request,[
            'usernameSearch' => 'required',
        ]);
       
     
       return redirect()->action('LobbyController@home', ['usernameSearch' => $request->input('usernameSearch')]);
    }

    /**
     * Funkcija za prikaz forme za registrovanje korisnika
     *
     * @return Response
     */
    public function registerForm(){
        return view('registerForm');
    }

    /**
     * Funkcija za registrovanje korisnika
     *
     * @param Request $request
     *
     * @return Response
     */
    public function registerUser(Request $request){

        $this->validate($request,[
            'korisnickoIme' => 'required|unique:user,username',
            'sifra' => 'required',
            'potvrdaSifre' => 'required',
            'lolUsername' => 'required|unique:user,lolNick'
        ]);

        $bannedUser = Ban::where('username', $request->input('korisnickoIme'))->first();
        $bannedLol = Ban::where('lolNick', $request->input('lolUsername'))->first();
        if($bannedUser!=null || $bannedLol!=null){
            return view('registerForm')->with('banned', "Banovani ste sa sajta");
        }
        
        if($request->input('sifra')!=$request->input('potvrdaSifre')){
             return view("registerForm")->with('notSame', "Niste ispravno potvrdili sifru");
        }

        $api_key='RGAPI-3295c182-2564-4de1-9e7e-53f0ddb04a13';
        $summonerName=$request->input("lolUsername");
        $filename='https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName.'?api_key='.$api_key;
        
       if($this->get_http_response_code($filename) != 200 ){
             return view("registerForm")->with('notMember', "Niste clan LoL zajednice");
       }

        $result= file_get_contents($filename);
        $user = new User();
        $user->username = $request->input("korisnickoIme");
        $user->password = bcrypt($request->input("sifra"));
        $user->online = 1;
        $user->isAdmin = 0;
        $user->isMod=0;
        $user->lolNick = $request->input("lolUsername");


        $summoner=json_decode($result);
        /*------------------------slika------------------------------*/
        $url_icon="http://avatar.leagueoflegends.com/eun1/".$summonerName.".png";
        $img_id=$summoner->profileIconId;

        $img='slike/icons/'.$img_id.".png";
        file_put_contents($img, file_get_contents($url_icon));

        $user->icon=$img;


        $user->level = $summoner->summonerLevel;

       


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

        $credentials = ['username' => $request->input("korisnickoIme"), 'password' => $request->input("sifra")];

        if (Auth::attempt($credentials)) {
          return redirect()->action('LobbyController@home');
           
        }
        else{
            $greska = "Doslo je do greske. Pokusajte kasnije";
            return view('registerForm')->with('greska', $greska);
        }
        
    }

}