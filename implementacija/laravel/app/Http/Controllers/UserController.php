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





use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Ad;
use App\Position;


use App\Article;
use App\Follow;




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
        $profilePic=Auth::user()->icon;
        
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

    	return view('profile.profileUser')->with('rank',$rank->name)->with('niz1',$niz1)->with('niz2',$niz2)->with('niz3',$niz3)->with('descr',$descr)->with('grade',$grade)->with('comments',$comments)->with('users',$commentingUsers)->with('icons',$commentingIcons)->with('username',Auth::user()->username)->with('level',Auth::user()->level)->with('profilePic',$profilePic);
    }

    public function redirectoAnotherUser(Request $request){
        $korisnik=User::find(5);
       

        return redirect()->action('UserController@anotherUser', ['korisnik' => $korisnik->id]);
        
    }

    public function anotherUser(Request $request){

        
        $kor=$request->korisnik;
        
        $blok=Block::where('user_id',Auth::user()->id)->orWhere('userBlocked_id',$kor)->first();
   
        $blok2=Block::where('userBlocked_id',Auth::user()->id)->orwhere('user_id',$kor)->first();
       echo $blok;
       echo $blok2;
   

        if($blok!=null || $blok2!=null){
            
               return redirect('users')->with('msgBlocked', 'Nije moguce pristupiti željenom profilu!');
        }

        $korisnik=User::find($kor);
        $rank=Rank::find($korisnik->rank_id);
        
        $adsModel=Ad::where('user_id',$korisnik->id)->get();

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
        $follow=Follow::where('user_id',Auth::user()->id)->orWhere('userFollowed_id',$korisnik->id)->first();
        $prati=1;
        if($follow==null){
            $prati=0;
        }
        $isMod=$korisnik->isMod;
        $profilePic=$korisnik->icon;
        $descr=$korisnik->description;
        $grade=round($korisnik->grade);
        $comments=Comment::where('user_id',$korisnik->id)->get();
        $commentingUsers=[];
        $commentingIcons=[];
        $i=0;
        foreach($comments as $c){
           
            $userCommenting=User::where('id',$c->userCommenting_id)->first();
             $commentingUsers[$i]=$userCommenting->username;
             $commentingIcons[$i]=$userCommenting->icon;
            $i++;
        }
        
        if(Auth::user()->isAdmin){
            return view('profile.profileAdmin')->with('rank',$rank->name)->with('niz1',$niz1)->with('niz2',$niz2)->with('niz3',$niz3)->with('descr',$descr)->with('grade',$grade)->with('comments',$comments)->with('users',$commentingUsers)->with('icons',$commentingIcons)->with('username',$korisnik->username)->with('level',$korisnik->level)->with('profilePic',$profilePic)->with('prati',$prati  )->with('isMod',$isMod);
        }else{
        return view('profile.profileAnotherUser')->with('rank',$rank->name)->with('niz1',$niz1)->with('niz2',$niz2)->with('niz3',$niz3)->with('descr',$descr)->with('grade',$grade)->with('comments',$comments)->with('users',$commentingUsers)->with('icons',$commentingIcons)->with('username',$korisnik->username)->with('level',$korisnik->level)->with('profilePic',$profilePic)->with('prati',$prati  )->with('isMod',$isMod);
        }
    }


    public function blokirajKorisnika(Request $request){
        $username=$request->username;
        $user = User::where('username', $username)->first();
        $userBlocked_id=$user->id;
        $user_id=Auth::user()->id;
        $block= new Block();
        $block->user_id=$user_id;
        $block->userBlocked_id=$userBlocked_id;
        $block->save();
        return  redirect('users');
    }

    public function zapratiKorisnika(Request $request){
        $pracenKorisnik=$request->pracenKorisnik;
        $pracenId=User::where('username', $pracenKorisnik)->first()->id;
        $id=Auth::user()->id;

        $follow= Follow::where('user_id',$id)->orWhere('userFollowed_id', $pracenId)->first();
        if($follow==null){
            $f=new Follow;
            $f->user_id=$id;
            $f->userFollowed_id=$pracenId;
            $f->save();
        }
        else{
            $follow->delete();
        }
        return  redirect()->back();

    }

    public function obrisiKom(Request $request){
        $korisnik=$request->korisnik;
        $id=User::where('username', $korisnik)->first()->id;
        $komentar=$request->komentar;
        Comment::where('user_id',$id)->orWhere('id',$komentar)->delete();
    }
  public function unaprediKorisnika(Request $request){
        $korisnik=$request->korisnik;
        $mod=User::where('username', $korisnik)->first();
       

       
        if($mod->isMod){
            $user = User::where('username', $korisnik)->update(['isMod'=>0]);
        }
        else{
             $user = User::where('username', $korisnik)->update(['isMod'=>1]);
        }
        return  redirect()->back();

    }



    public function oceniKorisnika(Request $request){
        
        $username=$request->username;
        $komentarisanUser=User::where('username', $username)->first()->id;
        $id=Auth::user()->id;
        $komentar=Comment::where('user_id', $komentarisanUser)->orWhere('userCommenting_id',$id)->first();
        if($komentar!=null){
            return redirect()->back()->with('msgComment','Maksimalno možete ostaviti jedan komentar.');
        }
        else{
             $komentar=$request->komentar;
             $ocena=$request->ocena;
             $novi= new Comment();
             if($komentar!=null){
                $novi->content=$komentar;

             }
             $novi->grade=$ocena;
             $novi->user_id=$komentarisanUser;
             $novi->userCommenting_id=$id;
             $novi->save();
             if(Auth::user()->grade==0){
                   $novaOcena= Auth::user()->grade;
             }else{
                $novaOcena= ($ocena+ Auth::user()->grade)/2;
             }
            $user = User::where('username', $username)->update(['grade'=>$novaOcena]);

             return redirect()->back();
         }

    }

    public function udaljiSaSajta(Request $request){
        $username=$request->username;
        $user=User::where('username', $username)->first();

        $ban=new Ban();
        $ban->username=$username;
        $ban->lolNick=$user->lolNick;
        $ban->save();
        User::where('username', $username)->delete();
    }

    public function openFormCreateAd(){
          return redirect()->action('CreateEditAdController@showFormAd');
    }



    public function slanjePoruke(Request $request){
        $this->validate($request,[
            'poruka'      =>'required|max:255',
          
        ]);
        
        $poruka=$request->poruka;
        echo $poruka;
        
      //  $user = User::where('username', Auth::user()->username)->update(['description'=>$descr]);
      //  return  redirect('users');

    }

    public function editDescription(Request $request){


    	$this->validate($request,[
            'description'      =>'required|max:255',
          
        ]);
        
        $descr=$request->input('description');
        $user = User::where('username', Auth::user()->username)->update(['description'=>$descr]);
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

   

    public function deleteAd(Request $request){
        $adId=$request->id;
        Ad::where('id', $adId)->delete();
        return  redirect()->back();
    }


    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    public function showGuestLobby(){
        $articles = Article::orderBy('updated_at', 'desc')->get();
        $users = [];
        foreach($articles as $article){
            $users[] = User::where('id', $article->user_id)->first();
        }
        $length = count($articles);
        return view('guestLobby')->with('articles', $articles)->with('length', $length)->with('users', $users);
    }

    public function logOut(){
        Auth::logout();
         return redirect()->action('UserController@showGuestLobby');
    }


    

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

        if(isset($request->usernameSearch)){
            $p=$request->usernameSearch;
            $users = User::where('username', 'like', $request->usernameSearch."%")->get();
           if(count($users)==0){
            $users[0]="Ne postoji korisnik";
           }
        }
        $theUser = Auth::user();
        if(Auth::user()->isAdmin){
            return view('adminLobby')->with('articles',$articles)->with('length', $length)->with('users', $users)->with('authors', $authors)->with('p',$p);
        }
        return view('userLobby')->with('articles', $articles)->with('length', $length)->with('followed', $followed)->with('users', $users)->with('authors', $authors)->with('p',$p)->with('theUser', $theUser);
    }
    public function searchUserByName(Request $request){
        $this->validate($request,[
            'usernameSearch' => 'required',
        ]);
       
     
       return redirect()->action('UserController@home', ['usernameSearch' => $request->input('usernameSearch')]);
    }

    public function registerForm(){
        return view('registerForm');
    }

     public function registerUser(Request $request){

        $this->validate($request,[
            'korisnickoIme' => 'required|unique:user,username',
            'sifra' => 'required',
            'potvrdaSifre' => 'required',
            'lolUsername' => 'required|unique:user,lolNick'
        ]);
        
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

        $user->level=$summoner->summonerLevel;

        $user->level = $summoner->summonerLevel;

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

        $credentials = ['username' => $request->input("korisnickoIme"), 'password' => $request->input("sifra")];

        if (Auth::attempt($credentials)) {
          return redirect()->action('UserController@home');
           
        }
        else{
            $greska = "Doslo je do greske. Pokusajte kasnije";
            return view('registerForm')->with('greska', $greska);
        }
        
    }

    public function proba(){

       $champions = Champion::all();
       return view('profile/forms/createEditAdForm')->with('champions', $champions);
    }

}
