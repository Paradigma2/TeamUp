<?php

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



    	//$checkLogin= User::where('Username',$username)->where('Password',$password)->first();
    	//count($checkLogin)>0

    	
    //	if (Auth::login($checkLogin)) {
    	// 	echo "da";
    		//return  redirect('users/UserController');
    //	}else{
    //		
    //		return back()->withErrors("Pogrešan username ili password!");
    //	}
    	
    	if (Auth::attempt(['username' => $username, 'password' => $password])) {
    		$user = User::where('username', $username)->update(['online' => 1]);
    		return  redirect()->action('UserController@home');

    	}else{
    		
    		return back()->withErrors("Pogrešan username ili password!");
    	}
    	


    }

    
    public function destroy(){
      User::where('id', Auth::user()->id)->update(['online' => 0]);

        Auth::logout();
         return redirect()->action('UserController@showGuestLobby');
   
    }
}
