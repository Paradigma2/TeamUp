<?php

/* Jana Kragovic 0023/2015
    Sanja Perišić 0097/2015*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Ban;

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
    		$user = User::where('username', $username)->update(['online' => 1]);
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
