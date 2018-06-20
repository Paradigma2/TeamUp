<?php


/* Jana Kragovic 0023/2015
    Sanja Perišić 0097/2015*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Ban;
use App\Rank;

use Illuminate\Foundation\Auth\AuthenticatesUsers;


class SessionController extends Controller
{
    use AuthenticatesUsers;

     /**
    * Funkcija za logovanje
    *
    * @param Request $request
    *
    * @return response 
    */
    public function create(Request $request){
    	$this->validate($request,[
    		'username'		=>'required',
    		'password'  	=>'required',
            
    	]);

    	$username=$request->get('username');

    	$password=$request->get('password');
    	$credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        $ban = Ban::where('username',$request->username)->first();

        if($ban!=null){
            return redirect()->back()->with('banovanSi','Pristup sajtu nije moguć, banovani ste');
        }
    	
    	if (Auth::attempt(['username' => $username, 'password' => $password])) {
    		//$user = User::where('username', $username)->update(['online' => 1]);
            $user=User::where('username', $username)->first();
            $user->online=1;
              $api_key='RGAPI-3295c182-2564-4de1-9e7e-53f0ddb04a13';
        $summonerName=$user->lolNick;
        $filename='https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/'.$summonerName.'?api_key='.$api_key;
         $result= file_get_contents($filename);
          $summoner=json_decode($result);
           $url_icon="http://avatar.leagueoflegends.com/eun1/".$summonerName.".png";
        $img_id=$summoner->profileIconId;

        $img='slike/icons/'.$img_id.".png";
        file_put_contents($img, file_get_contents($url_icon));

        $user->icon=$img;


        $user->level = $summoner->summonerLevel;
         $summonerId=$summoner->id;

         $filename='https://eun1.api.riotgames.com/lol/league/v3/positions/by-summoner/'.$summonerId.'?api_key='.$api_key;

        $result= file_get_contents($filename);
        $rankInfo=json_decode($result);
       
        $rank=$rankInfo[0]->tier." ".$rankInfo[0]->rank;
        
        $rankTable= Rank::where('name',$rank)->first();
        $user->rank_id=$rankTable->id;
        $user->update();
    		return  redirect()->action('LobbyController@home');

    	}else{
    		
    		return back()->withErrors("Pogrešan username ili password!");
    	}
    	


    }

     /**
    * Funkcija za log out
    *
    * @return response 
    */
    public function destroy(){
        User::where('id', Auth::user()->id)->update(['online' => 0]);

        Auth::logout();
        return redirect()->action('LobbyController@showGuestLobby');
   
    }
}
