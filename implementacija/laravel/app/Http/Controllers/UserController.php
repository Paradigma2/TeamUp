<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rank;
use App\Mode;
use App\Champion;
use App\Mastery;
use App\Comment;




use Illuminate\Support\Facades\Auth;
use Validator;

use App\Ad;
use App\Position;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    public function index(){
        $rank=Rank::find(Auth::user()->rank_id);
        
        $adsModel=Ad::where('user_id',Auth::user()->id)->get();

        $i=0;
        $niz1=[];
        $niz2=[];
        $niz3=[];
        foreach($adsModel as $ad){

            $position= Position::where('id',$ad->position_id)->first();
            $ime=$position->name;

            $mode=Mode::where('id',$ad->mode_id)->first();
            $imeMode=$mode->name;

            $mastery1=Mastery::where('id',$ad->mastery1_id)->first();
            $champ1=Champion::where('id',$mastery1->champion_id)->first();
            $icon1=$champ1->icon;
            if($ad->mastery2_id!=null){
                $mastery2=Mastery::where('id',$ad->mastery2_id)->first();
                $champ2=Champion::where('id',$mastery2->champion_id)->first();
                $icon2=$champ2->icon;
            }
            else{
                $icon2=null;
            }
            if($ad->mastery3_id!=null){
                $mastery3=Mastery::where('id',$ad->mastery3_id)->first();
                $champ3=Champion::where('id',$mastery3->champion_id)->first();
                $icon3=$champ3->icon;
            }
            else{
                $icon3=null;
            }
           
            $description=$ad->description;


            if($i==0){
                $niz1['position']= $position->name;
                $niz1['mode']= $mode->name;
                $niz1['description']= $description;
                $niz1['icon1']= $icon1;
                $niz1['icon2']= $icon2;
                $niz1['icon3']= $icon3;
                $niz1['id']=$ad->id;
            }else if ($i==1){
                $niz2['position']= $position->name;
                $niz2['mode']= $mode->name;
                $niz2['description']= $description;
                $niz2['icon1']= $icon1;
                $niz2['icon2']= $icon2;
                $niz2['icon3']= $icon3;
                $niz2['id']=$ad->id;
            }else{
                $niz3['position']= $position->name;
                $niz3['mode']= $mode->name;
                $niz3['description']= $description;
                $niz3['icon1']= $icon1;
                $niz3['icon2']= $icon2;
                $niz3['icon3']= $icon3;
                $niz3['id']=$ad->id;
            }
            $i++;
          
        }

        $descr=Auth::user()->description;
        $grade=round(Auth::user()->grade);
        $comments=Comment::where('user_id',Auth::user()->id)->get();
        $commentingUsers=[];
        $commentingIcons=[];
        $i=0;
        foreach($comments as $c){
           
            $userCommenting=User::where('id',$c->userCommenting_id)->first();
             $commentingUsers[$i]=$userCommenting->username;
             $commentingIcons[$i]=$userCommenting->icon;
            $i++;
        }

    	return view('profile.profileUser')->with('rank',$rank->name)->with('niz1',$niz1)->with('niz2',$niz2)->with('niz3',$niz3)->with('descr',$descr)->with('grade',$grade)->with('comments',$comments)->with('users',$commentingUsers)->with('icons',$commentingIcons);
    }
    
    public function editDescription(Request $request){

    	$this->validate($request,[
            'description'      =>'required|max:255',
          
        ]);
        
        $descr=$request->input('description');
        $user = User::where('Username', 'jana')->update(['Description'=>$descr]);
        return  redirect('users');
    }
    
    public function changePassword(Request $request){
        //validacija fali da se proveri stara loznka sa lozinkom u bazi
       
        $this->validate($request,[
            'staraLozinka'      =>'required',
            'novaLozinka'      =>'required|max:20|min:4|same:ponoviLozinku|different:staraLozinka',
            'ponoviLozinku'      =>'required',
        ]);
        
        $stara=$request->input('staraLozinka');
        $nova=$request->input('novaLozinka');
        $novaLozinka= bcrypt($nova);
        $ponovi=$request->input('ponoviLozinku');
       $user = User::where('Username', 'jana')->update(['Password'=>$novaLozinka]);
       return  redirect('users');
    }	

    public function home(){
        return view('guestLobby');
    }
    public function deleteAd(Request $request){
        $adId=$request->id;
        Ad::where('id', $adId)->delete();
        return  redirect('users');
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
        $user->level=$summoner->summonerLevel;
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
