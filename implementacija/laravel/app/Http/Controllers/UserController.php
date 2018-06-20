<?php
namespace App\Http\Controllers;

/* Jana Kragovic 0023/2015*/

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
use Illuminate\Support\Facades\Hash;
use DB;

use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Ad;
use App\Position;
use \Symfony\Component\HttpKernel\Exception\HttpException;

use App\Article;
use App\Follow;




class UserController extends Controller
{
    /**
    * UserController – klasa za edit profila, kreiranje oglasa, slanje poruka na profilu, blokiranje korisnika, ostavljanje komentaraa, pregleda profila drugih korisnika, pracenje korisnika
    *
    * @version 1.0
    */

    /**
    * Dohvata response kod
    *
    * @param $url
    *
    * @return response kod
    */
    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    /**
    * Funkcija za prikaz profila vlasnika
    *
    * @return response 
    */
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

    /**
    * Funkcija za prikaz profila vlasnika
    *
    * @return response 
    */
    public function showUser(){
        return redirect('users');
    }

    /**
    * Funkcija za dohvatanje id-a drugog korisnika, i prebacivanje na njegov profil
    *
    * @param Request $request
    *
    * @return response 
    */
    public function redirectoAnotherUser(Request $request){


        $korisnik=User::where('id', $request->id)->first();    
        if($korisnik==null)  {
             throw new HttpException(404);
        }
        if(Auth::user()->id==$korisnik->id){
            throw new HttpException(404);
        }
        return redirect()->action('UserController@anotherUser', ['korisnik' => $korisnik->id]);
        
    }

    /**
    * Funkcija za prikaz profila drugog korisnika
    *
    * @param Request $request
    *
    * @return response 
    */
    public function anotherUser(Request $request){

        
        $kor=$request->korisnik;
         
    if(Auth::user()->id==$kor){
            throw new  HttpException(404);
        }
       // $blok=Block::where('user_id',Auth::user()->id)->orWhere('userBlocked_id',$kor)->firs//t();
   
        $blok=Block::where('userBlocked_id',Auth::user()->id)->where('user_id',$kor)->first();
        if($blok!=null){
            
               return redirect()->back()->with('msgBlocked', 'Nije moguce pristupiti željenom profilu!');
        }

        $korisnik=User::find($kor);

if($korisnik==null)  {
             throw new HttpException(404);
        }
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
        $follow=Follow::where('user_id',Auth::user()->id)->where('userFollowed_id',$korisnik->id)->first();

        
        $prati=1;
        if($follow==null){
            $prati=0;
        }
        $isMod=$korisnik->isMod;
        $isAdmin=$korisnik->isAdmin;
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
        return view('profile.profileAnotherUser')->with('rank',$rank->name)->with('niz1',$niz1)->with('niz2',$niz2)->with('niz3',$niz3)->with('descr',$descr)->with('grade',$grade)->with('comments',$comments)->with('users',$commentingUsers)->with('icons',$commentingIcons)->with('username',$korisnik->username)->with('level',$korisnik->level)->with('profilePic',$profilePic)->with('prati',$prati  )->with('isMod',$isMod)->with('isAdmin',$isAdmin);
        }
    }

      /**
    * Funkcija za odblokiranje korisnika
    *
    * @param Request $request
    *
    * @return response 
    */
    public function odblokirajKorisnika(Request $request){
        $idBlocked=$request->id;
        $id=Auth::user()->id;

        Block::where('user_id',$id)->where('userBlocked_id',$idBlocked)->delete();
        

        return redirect()->action('UserController@anotherUser', ['korisnik' => $idBlocked]);

    }

      /**
    * Funkcija za blokiranje korisnika
    *
    * @param Request $request
    *
    * @return response 
    */
    public function blokirajKorisnika(Request $request){
        $username=$request->username;
        $user = User::where('username', $username)->first();

        $userBlocked_id=$user->id;
        $user_id=Auth::user()->id;

        $block= new Block();
        $block->user_id=$user_id;
        $block->userBlocked_id=$userBlocked_id;
        $block->save();

        $follow1=Follow::where('user_id',$user_id)->first();
        $follow2=Follow::where('userFollowed_id',$userBlocked_id)->first();

        if($follow1!=null){
            Follow::where('user_id',$user_id)->where('userFollowed_id',$userBlocked_id)->delete();
        }

        if($follow2!=null){
           $follow2=Follow::where('user_id',$userBlocked_id)->Where('userFollowed_id',$user_id)->delete(); 
        }

        return  redirect('users');
    }

      /**
    * Funkcija za pracenje korisnika
    *
    * @param Request $request
    *
    * @return response 
    */
    public function zapratiKorisnika(Request $request){
        $pracenKorisnik=$request->pracenKorisnik;
        $pracenId=User::where('username', $pracenKorisnik)->first()->id;
        $id=Auth::user()->id;

        $follow= Follow::where('user_id',$id)->where('userFollowed_id', $pracenId)->first();
       
       
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
      /**
    * Funkcija za brisanje komentara od strane admina
    *
    * @param Request $request
    *
    * @return response 
    */
    public function obrisiKom(Request $request){
        $korisnik=$request->korisnik;
        $id=User::where('username', $korisnik)->first()->id;
        $komentar=$request->komentar;
        Comment::where('user_id',$id)->where('id',$komentar)->delete();

        $cnt=DB::table('comment')->where('user_id', $id)->count();
        $ocene= $cnt=DB::table('comment')->where('user_id',  $id)->sum('grade');
        if($cnt!=0){
            //ovde
            $kor=User::where('username', $korisnik)->first();
            $kor->grade=($ocene/$cnt);
            $kor->update();
            $grade=round($ocene/$cnt);
        
         }else{
               $kor=User::where('username', $korisnik)->first();
             $kor->grade=0;
            $kor->update();
            $grade=0;
         }
        return redirect()->back();
    }
    
      /**
    * Funkcija za dodeljivanje moderatorskih privilegija
    *
    * @param Request $request
    *
    * @return response 
    */
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


      /**
    * Funkcija za ostavljanjeocene i komentara  korisniku
    *
    * @param Request $request
    *
    * @return response 
    */
    public function oceniKorisnika(Request $request){
        
        $username=$request->username;
        $komentarisanUser=User::where('username', $username)->first();
        $komentarisanUser_id=$komentarisanUser->id;
        $id=Auth::user()->id;
        $komentar=Comment::where('user_id', $komentarisanUser_id)->where('userCommenting_id',$id)->first();
        
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
             $novi->user_id=$komentarisanUser_id;
             $novi->userCommenting_id=$id;
             $novi->save();
           
            if($komentarisanUser->grade==null ||$komentarisanUser->grade==0){
             

              
                $komentarisanUser->grade=$ocena;
              $komentarisanUser->update();
             }else{
              
                $cnt=DB::table('comment')->where('user_id', $komentarisanUser_id)->count();
                $novaOcena= ($ocena+ $komentarisanUser->grade)/$cnt;
                  $komentarisanUser->grade=$novaOcena;
                $komentarisanUser->update();
             }

           return redirect()->back();
         }

    }

      /**
    * Funkcija za banovanje korisnika
    *
    * @param Request $request
    *
    * @return response 
    */
    public function udaljiSaSajta(Request $request){
        $username=$request->username;
        $user=User::where('username', $username)->first();

        $ban=new Ban();
        $ban->username=$username;
        $ban->lolNick=$user->lolNick;
        $ban->save();
        User::where('username', $username)->delete();
        return redirect()->action('LobbyController@showUserLobby');
    }

      /**
    * Funkcija za brisanje naloga
    *
    * @param Request $request
    *
    * @return response 
    */
    public function obrisiNalog(Request $request){
        $username=$request->username;
          Auth::logout();
        User::where('username', $username)->delete();
           return redirect()->action('LobbyController@showGuestLobby');
       
    }
      /**
    * Funkcija za prebacivanje na kontroler za oglase
    *
    * @return response 
    */
    public function openFormCreateAd(){
         
          return redirect()->action('CreateEditAdController@showFormAd');
    }


      /**
    * Funkcija za slanje poruke
    *
    * @param Request $request
    *
    * @return response 
    */
    public function slanjePoruke(Request $request){
        $this->validate($request,[
            'poruka'      =>'required|max:255',
          
        ]);
        $id = Auth::user()->id;
        $userSS = $request->username;
        $userS = User::where('username',$userSS)->first()->id;
        $focus = null;
        
        $kon1 = Conversation::where('user1_id', $id)->where('user2_id',$userS)->first();
        $kon2 = Conversation::where('user1_id', $userS)->where('user2_id', $id)->first(); 
        if($kon1 != null) {
            $focus = $kon1->id;
        }else if($kon2 != null){
            $focus = $kon2->id;
        }else{
            $konverzacija = new Conversation();
            $konverzacija->user1_id = $id;
            $konverzacija->user1_read = 1;
            $konverzacija->user2_id = $userS;
            $konverzacija->user2_read = 0;
            $konverzacija->save();
            $focus = $konverzacija->id;
        }

        $message = new Message;
        $message->user_id = $id;
        $message->conversation_id = $focus;
        $message->content = $request->input('poruka');   
        $message->save();
        DB::table('conversation')->where('id', $focus)->
            update(['updated_at' => $message->updated_at]);
        return redirect()->action('MessageController@show', ['conversation' => $focus]);
    }

      /**
    * Funkcija za menjanje opisa na profilu
    *
    * @param Request $request
    *
    * @return response 
    */
    public function editDescription(Request $request){


    	$this->validate($request,[
            'description'      =>'required|max:255',
          
        ]);
        
        $descr=$request->input('description');
        $user = User::where('username', Auth::user()->username)->update(['description'=>$descr]);
        return  redirect('users');

    }
    
      /**
    * Funkcija za promenu lozinke
    *
    * @param Request $request
    *
    * @return response 
    */
    public function changePassword(Request $request){
        
       
        $this->validate($request,[
           
            'novaLozinka'      =>'required|max:20|min:4|same:ponoviLozinku|',
            'ponoviLozinku'      =>'required',
        ]);
        
       
        $nova=$request->input('novaLozinka');
        $novaLozinka= bcrypt($nova);
        $ponovi=$request->input('ponoviLozinku');
        // $u= User::where('username', Auth::user()->username)->first();
        // if ($stara!= bcrypt($u->Password))   {

        //      return  redirect('users')->with("msgPass","Pogrešno ste uneli staru lozinku.");
        // }




       $user = User::where('username', Auth::user()->username)->update(['Password'=>$novaLozinka]);
       return  redirect('users');
    }	

   
      /**
    * Funkcija za brisanje oglasa
    *
    * @param Request $request
    *
    * @return response 
    */
    public function deleteAd(Request $request){
        $adId=$request->id;
        Ad::where('id', $adId)->delete();
        return  redirect()->back();
    }
      /**
    * Funkcija za odustajanje od izmene oglasa
    *
    * @return response 
    */
    public function odustaniOglas(){
       
        return redirect('users');
    }

  
}
